<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MaintenanceRequestRequest;
use App\Models\ClientAsset;
use App\Models\MaintenanceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Vinkla\Hashids\Facades\Hashids;

/**
 * Class MaintenanceRequestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MaintenanceRequestCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\MaintenanceRequest::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/maintenance-request');
        CRUD::setEntityNameStrings(__('crud.singular.maintenance_request'), __('crud.plural.maintenance_request'));
        $this->crud->addButtonFromModelFunction('line', 'open_google', 'openGoogle', 'beginning');
        $this->crud->with(['assets', 'client']);
        $this->crud->setShowView('crud.maintenance_request.hello');

    }

    protected function fetchClient()
    {
        return $this->fetch(\App\Models\Client::class);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {


        CRUD::column('id')->label('#');
        $this->crud->addColumn(
            [
                'label' => __('crud.models.Client.name'), // Table column heading
                'type' => "select",
                'name' => 'client_id', // the column that contains the ID of that connected entity;
                'entity' => 'client', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user
                'model' => "App\Models\Client", // foreign key model
            ]);

        $this->crud->addColumn(
            [
                'label' => __('crud.models.MaintenanceRequest.total'), // Table column heading
                'type' => "number",
                'name' => 'total', // the column that contains the ID of that connected entity;
                'editable' => true
            ]);
        $this->crud->addColumn(
            [
                'label' => __('crud.models.MaintenanceRequest.total_paid'), // Table column heading
                'type' => "number",
                'name' => 'total_paid', // the column that contains the ID of that connected entity;
                'editable' => true
            ]);
        $this->crud->addColumn(
            [
                'label' => __('crud.models.MaintenanceRequest.amount_due'), // Table column heading
                'type' => "number",
                'name' => 'amount_due', // the column that contains the ID of that connected entity;
                'editable' => true
            ]);

        CRUD::column('created_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->crud->addSaveAction([
            'name' => 'save_action_one',
            'redirect' => function ($crud, $request, $itemId) {
                return $crud->route;
            }, // what's the redirect URL, where the user will be taken after saving?

            // OPTIONAL:
            'button_text' => 'Save And View', // override text appearing on the button
            // You can also provide translatable texts, for example:
            // 'button_text' => trans('backpack::crud.save_action_one'),
            'visible' => function ($crud) {
                return true;
            }, // customize when this save action is visible for the current operation
            'referrer_url' => function ($crud, $request, $itemId) {
                return $crud->route;
            }, // override http_referrer_url
            'order' => 1, // change the order save actions are in
        ]);

        CRUD::setValidation(MaintenanceRequestRequest::class);

        $this->crud->addField([
            'label' => __('crud.models.Client.name'),
            'name' => 'client_id',
            'entity' => 'Client',
            'model' => "App\Models\Client",
            'attribute' => "name",
            'inline_create' => true,

        ]);
        $this->crud->addField(
            [

                'name' => 'total_paid',
                'type' => 'number',
                'label' => __('crud.models.MaintenanceRequest.total_paid'),
                'attributes' => ["step" => "any", 'min' => 0],
                'default' => '0',
            ]
        );
        $this->crud->addField([
            'name' => 'assets',
            'label' => __('crud.plural.client_asset'),
            'type' => 'repeatable',
            'new_item_label' => 'اضافة جهاز', // c
            'fields' => [

                [
                    'name' => 'name',
                    'type' => 'text',
                    'label' => __('crud.models.ClientAsset.name'),
                    'wrapper' => ['class' => 'form-group col-md-6'],
                ],
                [
                    'name' => 'issue',
                    'type' => 'text',
                    'label' => __('crud.models.ClientAsset.issue'),
                    'wrapper' => ['class' => 'form-group col-md-6'],
                ],
                [
                    'name' => 'cost',
                    'type' => 'number',
                    'label' => __('crud.models.ClientAsset.cost'),
                    'default' => '0',
                    'attributes' => ["step" => "any", 'min' => 0],
                    'wrapper' => ['class' => 'form-group col-md-6'],
                ],
                [   // date_picker
                    'name' => 'delivery_date',
                    'type' => 'date_picker',
                    'label' => __('crud.models.ClientAsset.delivery_date'),
                    'date_picker_options' => [
                        'todayBtn' => 'linked',
                        'format' => 'dd-mm-yyyy',
                        'language' => 'en'
                    ],
                    'wrapper' => ['class' => 'form-group col-md-6'],
                ],
                [
                    'label' => __('crud.models.Employee.name'),
                    'name' => 'employee_id',
                    'entity' => 'Employee',
                    'model' => "App\Models\Employee",
                    'attribute' => "name",
                ]


            ]
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    /**
     * Store a newly created resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {

        $this->crud->hasAccessOrFail('create');

        // execute the FormRequest authorization and validation, if one is required
        $request = $this->crud->validateRequest();


        $items = json_decode(request('assets'), true);
        $request_data = $this->crud->getStrippedSaveRequest();

        //Get Request Data And Pluck The Item to calculate The Total Cost
        $request_data['total'] = array_sum(Arr::pluck($items, 'cost'));

        // insert item in the db
        $item = $this->crud->create($request_data);
        $this->data['entry'] = $this->crud->entry = $item;

        // associate the client assets to the maintenance request
        $item->assets()->createMany($items);


        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // save the redirect choice for next time
        $this->crud->setSaveAction();

        return $this->crud->performSaveAction($item->getKey());
    }


    /**
     * Update the specified resource in the database.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $this->crud->hasAccessOrFail('update');
        /***
         * @var $item \App\Models\MaintenanceRequest
         */

// execute the FormRequest authorization and validation, if one is required
        $request = $this->crud->validateRequest();

        $request_data = $this->crud->getStrippedSaveRequest();
        //Get Request Data And Pluck The Item to calculate The Total Cost
        $request_data['total'] = array_sum(Arr::pluck(json_decode($this->crud->getStrippedSaveRequest()['assets'], true), 'cost'));

        // update the row in the db
        $item = $this->crud->update($request->get($this->crud->model->getKeyName()),
            $request_data);
        $this->data['entry'] = $this->crud->entry = $item;

        $item->assets()->delete();
        $item->assets()->createMany(json_decode($this->crud->getStrippedSaveRequest()['assets'], true));
        // show a success message
        \Alert::success(trans('backpack::crud.update_success'))->flash();

        // save the redirect choice for next time
        $this->crud->setSaveAction();

        return $this->crud->performSaveAction($item->getKey());
    }


    public function showClientStatus($id)
    {


        $decoded_id = Hashids::decode($id)[0] ?? null;
        if ($decoded_id) {
            $maintenanceRequest = MaintenanceRequest::with(['assets', 'client'])->findOrFail($decoded_id);

            return view('clientStatus', ['maintenanceRequest' => $maintenanceRequest]);
        } else
            abort(404);

    }
}

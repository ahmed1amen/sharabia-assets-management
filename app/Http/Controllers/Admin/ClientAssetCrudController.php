<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientAssetRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientAssetCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientAssetCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
        // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
        //    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
        //    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
            use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\ClientAsset::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/client-asset');
        CRUD::setEntityNameStrings(__('crud.singular.client_asset'), __('crud.plural.client_asset'));


    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        CRUD::column('id');
        CRUD::column('name');
        CRUD::column('issue');
        CRUD::column('delivery_date');
        CRUD::column('employee_id');

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
        CRUD::setValidation(ClientAssetRequest::class);

        $this->crud->addField(
            [
                'label' => "Employee", // Table column heading
                'type' => "select2",
                'name' => 'employee_id', // the column that contains the ID of that connected entity;
                'entity' => 'Employee', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user
                'model' => "App\Models\Employee", // foreign key model
            ]);
        CRUD::field('name');
        $this->crud->addField(
            [
                'label' => "issue",
                'type' => "textarea",
                'name' => 'issue',
            ]);

        CRUD::field('delivery_date');


        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }


    protected function fetchClient()
    {
        return $this->fetch(\App\Models\Client::class);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
//    public function show($id)
//    {
//        $this->crud->hasAccessOrFail('show');
//
//        // get entry ID from Request (makes sure its the last ID for nested resources)
//        $id = $this->crud->getCurrentEntryId() ?? $id;
//        $setFromDb = $this->crud->get('show.setFromDb');
//
//        // get the info for that entry
//        $this->data['entry'] = $this->crud->getEntry($id);
//        $this->data['crud'] = $this->crud;
//        $this->data['title'] = $this->crud->getTitle() ?? trans('backpack::crud.preview').' '.$this->crud->entity_name;
//        return view('crud.maintenance_request.requestAssets', $this->data);
//    }
}

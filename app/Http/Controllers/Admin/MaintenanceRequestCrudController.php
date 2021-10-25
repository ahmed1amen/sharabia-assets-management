<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MaintenanceRequestRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

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

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\MaintenanceRequest::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/maintenance-request');
        CRUD::setEntityNameStrings('maintenance request', 'maintenance requests');
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
                'label' => "Client", // Table column heading
                'type' => "select",
                'name' => 'client_id', // the column that contains the ID of that connected entity;
                'entity' => 'client', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user
                'model' => "App\Models\Client", // foreign key model
            ]);

        CRUD::column('total');
        CRUD::column('total_paid');
        CRUD::column('amount_due');



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
        CRUD::setValidation(MaintenanceRequestRequest::class);
        CRUD::field('client_id');
        CRUD::field('total');
        CRUD::field('total_paid');
        $this->crud->addField([
            'name'  => 'assets',
            'label' => 'Assets',
            'type'  => 'repeatable',
            'fields' => [
                [
                    'name'    => 'name',
                    'type'    => 'text',
                    'label'   => 'Name',
                    'wrapper' => ['class' => 'form-group col-md-4'],
                ],
                [
                    'name'    => 'issue',
                    'type'    => 'text',
                    'label'   => 'issue',
                    'wrapper' => ['class' => 'form-group col-md-4'],
                ],
                [
                    'name'    => 'deliver_date',
                    'type'  => 'date',
                    'label'   => 'Deliver Date',
                    'wrapper' => ['class' => 'form-group col-md-4'],
                ],

            ],

            // optional
            'new_item_label'  => 'Add Group', // customize the text of the button
            'init_rows' => 1, // number of empty rows to be initialized, by default 1


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
}

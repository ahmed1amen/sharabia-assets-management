<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\InlineCreateOperation;



    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Client::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/client');
        CRUD::setEntityNameStrings(__('crud.singular.client'), __('crud.plural.client'));
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        $this->crud->column('id')->label(__('crud.models.Client.id'));
        $this->crud->column('name')->label(__('crud.models.Client.name'));
        $this->crud->column('email')->label(__('crud.models.Client.email'));
        $this->crud->column('phone')->label(__('crud.models.Client.phone'));
        $this->crud->column('address')->label(__('crud.models.Client.address'));
        $this->crud->column('notes')->label(__('crud.models.Client.notes'));
        $this->crud->column('created_at')->label(__('crud.models.created_at'));


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
        CRUD::setValidation(ClientRequest::class);



        $this->crud->addField(
            [
                'label' => __('crud.models.Client.name'), // Table column heading
                'type' => "text",
                'name' => 'name', // the column that contains the ID of that connected entity;
            ]);


        $this->crud->addField(
            [
                'label' => __('crud.models.Client.phone'), // Table column heading
                'type' => "text",
                'name' => 'phone', // the column that contains the ID of that connected entity;
            ]);

        $this->crud->addField(
            [
                'label' => __('crud.models.Client.email'), // Table column heading
                'type' => "email",
                'name' => 'email', // the column that contains the ID of that connected entity;
            ]);
        $this->crud->addField(
            [
                'label' => __('crud.models.Client.address'), // Table column heading
                'type' => "text",
                'name' => 'address', // the column that contains the ID of that connected entity;
            ]);

        $this->crud->addField(
            [
                'label' => __('crud.models.Client.notes'), // Table column heading
                'type' => "textarea",
                'name' => 'notes', // the column that contains the ID of that connected entity;
            ]);

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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmployeeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EngineerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EngineerCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Employee::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/engineer');
        CRUD::setEntityNameStrings(__('crud.singular.engineer'), __('crud.plural.engineer'));
        $this->crud->addClause('where', 'type', '=', 1);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->column('id')->label(__('crud.models.Engineer.id'));
        $this->crud->column('name')->label(__('crud.models.Engineer.name'));
        $this->crud->column('position')->label(__('crud.models.Engineer.position'));
        $this->crud->column('description')->label(__('crud.models.Engineer.description'));
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
        CRUD::setValidation(EmployeeRequest::class);

        $this->crud->addField(
            [
                'label' => __('crud.models.Engineer.name'), // Table column heading
                'type' => "text",
                'name' => 'name', // the column that contains the ID of that connected entity;
            ]);
        $this->crud->addField(
        [
                'label' => __('crud.models.Engineer.position'), // Table column heading
                'type' => "text",
                'name' => 'position', // the column that contains the ID of that connected entity;
            ]);


        $this->crud->addField(
            [
                'label' => __('crud.models.Engineer.description'), // Table column heading
                'type' => "textarea",
                'name' => 'description', // the column that contains the ID of that connected entity;
            ]);

     $this->crud->addField(
            [
                'name'  => 'type',
                'type'  => 'hidden',
                'value' => '1',
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

<?php

use App\Http\Controllers\Admin\MaintenanceRequestCrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {

 $maintenanceRequest = \App\Models\MaintenanceRequest::with(['assets','client'])->find(1);
// return $maintenanceRequest;
    return view('crud.maintenance_request.requestAssets')->with(['maintenanceRequest'=>$maintenanceRequest]);
});

Route::get('/clientStatus/{id}', [MaintenanceRequestCrudController::class,'showClientStatus'])->name('client.status');

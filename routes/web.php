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

 return redirect('/admin/dashboard');
});

Route::get('/clientStatus/{id}', [MaintenanceRequestCrudController::class,'showClientAssetsInvoice'])->name('client.status');
Route::get('/admin/maintenance-request/{id}/all', [MaintenanceRequestCrudController::class,'showClientAssetsSticker'])->name('client.assets.stickers');

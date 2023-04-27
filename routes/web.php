<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
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
    return view('home');
});
Route::group(['prefix' => 'employe'],function(){
    Route::get('/',[EmployeController::class, 'index']);
    Route::get('/view',[EmployeController::class, 'view_data']);
    Route::get('/getdata',[EmployeController::class, 'get_data']);
    Route::get('/getdatauser',[EmployeController::class, 'getdatauser']);
    Route::get('/getrole',[EmployeController::class, 'get_role']);
    Route::get('/delete',[EmployeController::class, 'delete']);
    Route::get('/switch_to',[EmployeController::class, 'switch_to']);
    Route::get('/create',[EmployeController::class, 'create']);
    Route::get('/modal',[EmployeController::class, 'modal']);
    Route::post('/',[EmployeController::class, 'store']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

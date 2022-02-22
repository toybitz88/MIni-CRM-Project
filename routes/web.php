<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


//Department Resource
Route::get('depart/{$id}/delete',[DepartmentController::class,'destroy']);
Route::resource('depart',DepartmentController::class);

//Employee Resource
Route::get('employee/{$id}/delete',[EmmployeeController::class,'destroy']);
Route::resource('employee',EmployeeController::class);

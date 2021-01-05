<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EmployeesModelController;
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

// Route::get('/user', function () {
//     return view('User.index');
// });

Route::resource('users', UserController::class);
Route::resource('contact', ContactController::class);
Route::resource('employees', EmployeesController::class);
Route::get('employees/{id}/delete', [ EmployeesController::class,"destroy"])->name("employees.delete");

Route::middleware(['auth'])->group(function(){
Route::get("employeesModel/paging",[EmployeesModelController::class,'paging']);
Route::get("employeesModel/search",[EmployeesModelController::class,'search']);
Route::get("employeesModel/search-paging",[EmployeesModelController::class,'searchPaging']);
Route::get("employeesModel/search-paging-advanced",[EmployeesModelController::class,'searchPagingAdvanced']);
Route::resource('employeesModel', EmployeesModelController::class);
Route::get('employeesModel/{id}/delete', [ EmployeesModelController::class,"destroy"])->name("employeesModel.delete");  
});



// auth route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
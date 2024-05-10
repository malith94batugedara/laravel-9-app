<?php

use App\Http\Controllers\EmployeeController;
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
    return view('welcome');
});

Route::get('/add-employees',[EmployeeController::class,'create'])->name('employee.create');

Route::post('/add-employees',[EmployeeController::class,'store'])->name('employee.store');

Route::get('/all-employees', [EmployeeController::class, 'index'])->name('employee.index');

Route::get('/edit-employees/{employee_id}', [EmployeeController::class, 'edit'])->name('employee.edit');

Route::post('/update-employees/{employee_id}',[EmployeeController::class,'update'])->name('employee.update');

Route::get('/delete-employees/{employee_id}', [EmployeeController::class, 'destroy'])->name('employee.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes(['register' => false]);

Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index']);
Route::post('/companies', [App\Http\Controllers\CompanyController::class, 'store']);
Route::get('/companies/create', [App\Http\Controllers\CompanyController::class, 'create']);
Route::get('/companies/{id}', [App\Http\Controllers\CompanyController::class, 'edit']);
Route::patch('/companies/{id}', [App\Http\Controllers\CompanyController::class, 'update']);
Route::delete('/companies/{id}', [App\Http\Controllers\CompanyController::class, 'destroy']);

Route::get('/company/{id}', [App\Http\Controllers\CompanyController::class, 'show']);

Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index']);
Route::post('/employees', [App\Http\Controllers\EmployeeController::class, 'store']);
Route::get('/employees/create', [App\Http\Controllers\EmployeeController::class, 'create']);
Route::get('/employees/{id}', [App\Http\Controllers\EmployeeController::class, 'edit']);
Route::patch('/employees/{id}', [App\Http\Controllers\EmployeeController::class, 'update']);
Route::delete('/employees/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy']);

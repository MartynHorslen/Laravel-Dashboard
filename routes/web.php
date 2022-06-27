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

//['register' => false]
Auth::routes();

Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index']);

Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index']);

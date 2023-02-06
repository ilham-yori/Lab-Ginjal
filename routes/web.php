<?php

namespace App\Http\Controllers;
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

Route::get('/admin', [Admin\DashboardController::class, 'index']);
Route::get('/laborant', [Laborant\DashboardController::class, 'index']);

Route::get('/employee', [Admin\EmployeeController::class, 'index']);
Route::get('/employee/create', [Admin\EmployeeController::class, 'create']);
Route::post('/employee/store', [Admin\EmployeeController::class, 'store']);
Route::get('/employee/edit/{id}', [Admin\EmployeeController::class, 'edit']);
Route::post('/employee/update', [Admin\EmployeeController::class, 'update']);
Route::get('/employee/delete/{id}', [Admin\EmployeeController::class, 'destroy']);
Route::get('/employee/modify/{id}', [Admin\EmployeeController::class, 'modify']);

Route::get('/patient', [Admin\PatientController::class, 'index']);
Route::get('/patient/create', [Admin\PatientController::class, 'create']);
Route::post('/patient/store', [Admin\PatientController::class, 'store']);
Route::get('/patient/edit/{id}', [Admin\PatientController::class, 'edit']);
Route::post('/patient/update', [Admin\PatientController::class, 'update']);
Route::get('/patient/delete/{id}', [Admin\PatientController::class, 'destroy']);
Route::get('/patient/modify/{id}', [Admin\PatientController::class, 'modify']);

Route::get('/laborant/history', [Laborant\DetectionHistoryController::class, 'index']);

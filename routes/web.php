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

Route::get('/', [LoginController::class, 'index']);
Route::post('/req', [LoginController::class, 'req']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/admin', [Admin\DashboardController::class, 'index'])->middleware('auth');

Route::get('/laborant', [Laborant\DashboardController::class, 'index'])->middleware('auth');
Route::get('/laborant/detection', [Laborant\DetectionHistoryController::class, 'index'])->middleware('auth');
Route::get('/laborant/detection/add', [Laborant\DetectionHistoryController::class, 'add'])->middleware('auth');

Route::get('/employee', [Admin\EmployeeController::class, 'index'])->middleware('auth');
Route::get('/employee/create', [Admin\EmployeeController::class, 'create'])->middleware('auth');
Route::post('/employee/store', [Admin\EmployeeController::class, 'store'])->middleware('auth');
Route::get('/employee/edit/{id}', [Admin\EmployeeController::class, 'edit'])->middleware('auth');
Route::post('/employee/update', [Admin\EmployeeController::class, 'update'])->middleware('auth');
Route::get('/employee/delete/{id}', [Admin\EmployeeController::class, 'destroy'])->middleware('auth');
Route::get('/employee/modify/{id}', [Admin\EmployeeController::class, 'modify'])->middleware('auth');

Route::get('/patient', [Admin\PatientController::class, 'index'])->middleware('auth');
Route::get('/patient/create', [Admin\PatientController::class, 'create'])->middleware('auth');
Route::post('/patient/store', [Admin\PatientController::class, 'store'])->middleware('auth');
Route::get('/patient/edit/{id}', [Admin\PatientController::class, 'edit'])->middleware('auth');
Route::post('/patient/update', [Admin\PatientController::class, 'update'])->middleware('auth');
Route::get('/patient/delete/{id}', [Admin\PatientController::class, 'destroy'])->middleware('auth');
Route::get('/patient/modify/{id}', [Admin\PatientController::class, 'modify'])->middleware('auth');



Route::get('/laborant/history', [Laborant\DetectionHistoryController::class, 'index'])->middleware('auth');

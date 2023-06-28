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
Route::get('chart', [ChartJSController::class, 'index']);

Route::get('/doctor', [Doctor\DashboardController::class, 'index'])->middleware('auth');
Route::get('/doctor/unvalidate', [Doctor\ValidationController::class, 'index'])->middleware('auth');
Route::get('/doctor/history', [Doctor\ValidationController::class, 'history'])->middleware('auth');
Route::get('/doctor/recent', [Doctor\ValidationController::class, 'recent'])->middleware('auth');
Route::get('/doctor/detail/{id}', [Doctor\ValidationController::class, 'detail'])->middleware('auth');
Route::get('/doctor/validate/{id}', [Doctor\ValidationController::class, 'validation'])->middleware('auth');
Route::post('/doctor/validate/{id}/store', [Doctor\ValidationController::class, 'store'])->middleware('auth');

Route::get('/laborant', [Laborant\DashboardController::class, 'index'])->middleware('auth');
Route::get('/laborant/unvalidate', [Laborant\DetectionHistoryController::class, 'index'])->middleware('auth');
Route::get('/laborant/history', [Laborant\DetectionHistoryController::class, 'history'])->middleware('auth');
Route::get('/laborant/detection/create', [Laborant\DetectionHistoryController::class, 'create'])->middleware('auth');
Route::post('/laborant/detection/store', [Laborant\DetectionHistoryController::class, 'store'])->middleware('auth');
Route::get('/laborant/delete/{id}', [Laborant\DetectionHistoryController::class, 'destroy'])->middleware('auth');
Route::get('/laborant/detail/{id}', [Laborant\DetectionHistoryController::class, 'detail'])->middleware('auth');

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

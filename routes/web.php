<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AppointmentController::class , 'index'])->name('index');
Route::post('/appointment', [AppointmentController::class , 'index'])->name('appointments');


// Route::get('/showallreports', [ReportController::class , 'index'])->name('showallreports');
Route::get('/showreport/{id}', [ReportController::class , 'showreport'])->name('showreport');

Route::get('/addreport', [ReportController::class , 'addreport'])->name('addreport');
Route::post('/addreport', [ReportController::class , 'reportadd'])->name('reportadd');

Route::get('/editreport', [ReportController::class , 'editreport'])->name('editreport');
Route::post('/editreport', [ReportController::class , 'reportedit'])->name('reportedit');


Route::post('/deletreport', [ReportController::class , 'deletreport'])->name('deletreport');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

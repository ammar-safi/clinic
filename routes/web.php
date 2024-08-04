<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', [AppointmentController::class , 'index'])->middleware('auth')->name('index');
Route::post('/appointment', [AppointmentController::class , 'index'])->middleware('auth')->name('appointments');
Route::get('/admin/password', [AdminController::class , 'changingPassword'])->middleware('auth')->name('change_Password');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


////////////////

Route::get('rating/all', [ReviewController::class, 'index'])->middleware('auth')->name('rating-all');
Route::get('rating/one/{id}', [ReviewController::class, 'show'])->middleware('auth')->name('showrate');

Route::get('rating/add', [ReviewController::class, 'create'])->middleware('auth')->name('rating-add');
Route::post('rating/add/create', [ReviewController::class, 'store'])->name('create_rating');

//عدل هون , ضفة عالراوت كلمة id
Route::get('rating/id/{id}', [ReviewController::class, 'edit'])->middleware('auth')->name('edit_rating');
Route::post('rating/update/{id}', [ReviewController::class, 'update'])->name('update_rating');

Route::get('rating/delete/{id}', [ReviewController::class, 'destroy'])->middleware('auth')->name('delete_rating');

Route::get('rating/high', [ReviewController::class, 'get_high_doctor'])->middleware('auth')->name('high_rating');
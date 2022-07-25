<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');

Route::get('/add_doctor_view',[AdminController::class,'addView']);
Route::get('/showDoctor',[AdminController::class,'showDoctor']);

Route::get('/myAppointment',[HomeController::class,'myAppointment']);
Route::get('/showAppointment',[AdminController::class,'showAppointment']);
Route::get('/emailView/{id}',[AdminController::class,'emailView']);
Route::get('/cancel/{id}',[HomeController::class,'delete']);

Route::get('/approve/{id}',[AdminController::class,'approve']);
Route::get('/cancel/{id}',[AdminController::class,'cancel']);
Route::get('/update/{id}',[AdminController::class,'updateDoctor']);
Route::get('/delete/{id}',[AdminController::class,'delete']);

Route::POST('/upload_info',[AdminController::class,'update']);
Route::POST('/edit_info/{id}',[AdminController::class,'edit']);
Route::POST('/sendEmail/{id}',[AdminController::class,'send']);

Route::POST('/appointment',[HomeController::class,'appointment']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

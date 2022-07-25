<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\TrainController;
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
Route::get('/',[FrontendController::class,'index'])->name('home');

Route::post('/check',[FrontendController::class,'check']);

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

    Route::get('/trains',[TrainController::class,'trains'])->name('trains');
    Route::get('/add-train',[TrainController::class,'addTrain'])->name('add-train');
    Route::post('/save-train',[TrainController::class,'saveTrain'])->name('save-train');
    Route::get('/edit-train/{id}',[TrainController::class,'editTrain'])->name('edit-train');
    Route::post('/delete-bogi/{id}',[TrainController::class,'deleteBogi'])->name('delete-bogi');
    Route::post('/delete-seat/{id}',[TrainController::class,'deleteSeat'])->name('delete-seat');

    Route::get('/list-stations',[StationController::class,'stations']);
});

require __DIR__.'/auth.php';

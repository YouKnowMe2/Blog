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
Route::get('/redirects', [HomeController::class,'redirects']);
Route::get('/showCart/{id}', [HomeController::class,'showCart']);
Route::get('/removeCart/{id}', [HomeController::class,'removeCart']);
Route::POST('/addCart/{id}', [HomeController::class,'addCart']);
Route::POST('/order_confirm/', [HomeController::class,'order_confirm']);


Route::get('/users', [AdminController::class,'users'])->name('users');
Route::get('/foodMenu', [AdminController::class,'foodMenu'])->name('foodMenu');
Route::get('/reservation', [AdminController::class,'viewReservation'])->name('viewReservation');
Route::get('/orders', [AdminController::class,'orders'])->name('orders');
Route::get('/search', [AdminController::class,'search'])->name('search');
Route::get('/viewChef', [AdminController::class,'viewChef'])->name('viewChef');
Route::get('/deleteUser/{id}', [AdminController::class,'delete']);
Route::get('/deleteFood/{id}', [AdminController::class,'deleteFood'])->name('deleteFood');
Route::get('/deleteChef/{id}', [AdminController::class,'deleteChef'])->name('deleteChef');
Route::get('/deleteReservation/{id}', [AdminController::class,'deleteReservation'])->name('deleteReservation');
Route::get('/viewFood/{id}', [AdminController::class,'viewFood'])->name('viewFood');
Route::get('/editchef/{id}', [AdminController::class,'editChef'])->name('editchef');
Route::Post('/editedChef/{id}', [AdminController::class,'editedChef'])->name('editedChef');
Route::POST('/updateFood/{id}', [AdminController::class,'updateFood'])->name('updateFood');
Route::POST('/reservation', [AdminController::class,'reservation'])->name('reservation');

Route::POST('/upload_food', [AdminController::class,'upload_food'])->name('upload_food');
Route::POST('/upload_chef', [AdminController::class,'upload_chef'])->name('upload_chef');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

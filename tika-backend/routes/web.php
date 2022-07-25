<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VaccinationCenterController;
use App\Http\Controllers\VaccineController;
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

Route::middleware(['auth','verified'])->group(function (){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/people',PeopleController::class);
    Route::resource('/registration',RegistrationController::class);
    Route::resource('/vaccination_center',VaccinationCenterController::class);
    Route::resource('/vaccines',VaccineController::class);
    Route::resource('/divisions',DivisionController::class);
    Route::post('/divisions-enable-disable/{id}',[DivisionController::class,'enableDisable'])->name('divisions-enable-disable');
});


require __DIR__.'/auth.php';

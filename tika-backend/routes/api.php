<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/test',function (){
    return 'who hello this might work';
});
Route::post('/verify',[VerificationController::class, 'verify']);
Route::post('/verifyData',[VerificationController::class, 'verifyData']);

Route::POST('/phone-verify',[CategoryController::class, 'phoneVerify']);
Route::POST('/phone-verify-code',[CategoryController::class, 'phoneVerifyCode']);
Route::POST('/registration',[CategoryController::class, 'registration']);

Route::get('/categories',[CategoryController::class, 'index']);
Route::get('/divisions',[DistrictController::class, 'divisions']);
Route::get('/districts',[DistrictController::class, 'index']);
Route::get('/upzillas',[DistrictController::class, 'upzillas']);
Route::get('/centers',[DistrictController::class, 'centers']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

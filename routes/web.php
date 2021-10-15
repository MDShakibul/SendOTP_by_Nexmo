<?php

use App\Http\Controllers\OtpController;
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


Route::get('/',[OtpController::class,'index']);
Route::get('/home',[OtpController::class,'home']);
Route::get('/confirm-otp',[OtpController::class,'confirm_page']);
Route::post('/send',[OtpController::class,'send']);
Route::post('/confirm',[OtpController::class,'confirm']);

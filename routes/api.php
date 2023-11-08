<?php

use App\Http\Controllers\Api\FarePriceController;
use App\Http\Controllers\Api\FeedBackController;
use App\Http\Controllers\Api\FilterController;
use App\Http\Controllers\Api\User\Auth\LoginController;
use App\Http\Controllers\Api\User\Auth\PasswordController;
use App\Http\Controllers\Api\User\Auth\SignUpController;
use App\Http\Controllers\Api\User\Core\IndexController;
use App\Http\Controllers\Api\User\OTP\VerificationController;
use App\Http\Controllers\Api\User\Profile\ProfileController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login', function () {
    return response()->json(["status"=>0,"message"=>"Sorry User is Unauthorize"], 401);
})->name('login');

Route::post('signin', [SignUpController::class, 'signIn']);
Route::post('signup/resend-otp', [SignUpController::class, 'resendSignUpOtp']);

Route::post('otp-verify', [VerificationController::class, 'otpVerify']);

Route::post('login', [LoginController::class, 'login']);
Route::post('forgot-password', [PasswordController::class, 'forgotPassword']);
Route::post('reset/forgot-password', [PasswordController::class, 'resetForgotPassword']);
Route::get('content', [ProfileController::class, 'content']);
Route::post('social', [LoginController::class, 'socialAuth']);


// Route::get('');
Route::get('get-distance',[FarePriceController::class,'calculateDistances']);
Route::get('get-distance2',[FarePriceController::class,'calculateDistances2']);

Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::post('change-password', [ProfileController::class , 'changePassword']);
    Route::post('update-profile', [ProfileController::class , 'completeProfile']);
    // Route::get('profile', [ProfileController::class , 'profile']);
    Route::post('logout', [LoginController::class , 'logout']);
    
    
    //Core Module 
    Route::get('filter',[FilterController::class,'filter']);
    Route::get('search/fare',[FarePriceController::class,'calculateFarePrice']);
    Route::get('fare-history',[FarePriceController::class,'fareHistory']);
    Route::post('feedback',[FeedBackController::class,'createFeedBack']);
    
    Route::post('toggle-notification', [ProfileController::class,'toggleNotification']);


    
});
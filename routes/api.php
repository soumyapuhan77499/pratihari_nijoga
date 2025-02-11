<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OtpController;
use App\Http\Controllers\Api\PratihariProfileApiController;
use App\Http\Controllers\Api\PratihariFamilyApiController;

Route::post('/send-otp', [OtpController::class, 'sendOtp'])->name('api.send-otp');
Route::post('/verify-otp', [OtpController::class, 'verifyOtp'])->name('api.verify-otp');

Route::middleware('auth:sanctum')->post('/userLogout', [OtpController::class, 'userLogout']);
Route::post('/save-profile', [PratihariProfileApiController::class, 'saveProfile']);
Route::middleware('auth:sanctum')->post('/save-family', [PratihariFamilyApiController::class, 'saveFamily']);

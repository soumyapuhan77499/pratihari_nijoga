<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OtpController;
use App\Http\Controllers\Api\PratihariProfileApiController;

Route::post('/send-otp', [OtpController::class, 'sendOtp'])->name('api.send-otp');
Route::post('/verify-otp', [OtpController::class, 'verifyOtp'])->name('api.verify-otp');

Route::middleware('auth:sanctum')->post('/userLogout', [OtpController::class, 'userLogout']);
Route::middleware('auth:sanctum')->post('/save-profile', [PratihariProfileApiController::class, 'saveProfile']);

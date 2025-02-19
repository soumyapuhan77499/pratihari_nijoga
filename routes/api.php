<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OtpController;
use App\Http\Controllers\Api\PratihariProfileApiController;
use App\Http\Controllers\Api\PratihariFamilyApiController;
use App\Http\Controllers\Api\PratihariIdcardApiController;
use App\Http\Controllers\Api\PratihariAddressApiController;
use App\Http\Controllers\Api\PratihariOccupationApiController;

Route::post('/send-otp', [OtpController::class, 'sendOtp'])->name('api.send-otp');
Route::post('/verify-otp', [OtpController::class, 'verifyOtp'])->name('api.verify-otp');

Route::middleware('auth:sanctum')->post('/userLogout', [OtpController::class, 'userLogout']);
Route::middleware('auth:sanctum')->post('/save-profile', [PratihariProfileApiController::class, 'saveProfile']);
Route::middleware('auth:sanctum')->post('/save-family', [PratihariFamilyApiController::class, 'saveFamily']);
Route::middleware('auth:sanctum')->post('/save-idcard', [PratihariIdcardApiController::class, 'saveIdcard']);
Route::middleware('auth:sanctum')->post('/save-address', [PratihariAddressApiController::class, 'saveAddress']);
Route::middleware('auth:sanctum')->post('/save-occupation', [PratihariOccupationApiController::class, 'saveOccupation']);

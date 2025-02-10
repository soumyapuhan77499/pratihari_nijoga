<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PratihariProfileController;
use App\Http\Controllers\Admin\PratihariFamilyController;
use App\Http\Controllers\Admin\PratihariIdcardController;
use App\Http\Controllers\Admin\PratihariAddressController;
use App\Http\Controllers\Admin\PratihariOccupationController;
use App\Http\Controllers\Admin\MasterNijogaSebaController;
use App\Http\Controllers\Admin\PratihariSebaController;
use App\Http\Controllers\Admin\PratihariSocialMediaController;


// login information route
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(AdminController::class)->group(function() {
    Route::get('/', 'AdminLogin')->name('admin.AdminLogin');
    Route::get('/admin/register', 'AdminRegister')->name('admin.register');
    Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
    Route::post('/save-admin-login', 'saveAdminLogin')->name('admin.saveAdminLogin');
    Route::post('/save-admin-register', 'saveAdminRegister')->name('admin.saveAdminRegister');
    Route::get('/admin-logout','adminLogout')->name('admin.logout');

    Route::get('/forgot-password','showResetForm')->name('password.reset.form');
    Route::post('/save-forgot-password','resetPassword')->name('admin.resetPassword');


});

Route::controller(PratihariProfileController::class)->group(function() {
    Route::get('/admin/pratihari-profile', 'pratihariProfile')->name('admin.pratihariProfile');
    Route::post('/admin/pratihari-profile-save', 'saveProfile')->name('admin.pratihari-profile.store');
    Route::get('/admin/pratihari-manage-profile', 'pratihariManageProfile')->name('admin.pratihariManageProfile');
    Route::get('/get-pratihari-address','getPratihariAddress')->name('getPratihariAddress');

});

Route::prefix('admin')->group(function() {
    Route::get('/pratihari-family', [PratihariFamilyController::class, 'pratihariFamily'])->name('admin.pratihariFamily');
    Route::post('/pratihari-family-save', [PratihariFamilyController::class, 'saveFamily'])->name('admin.pratihari-family.store');
});


Route::prefix('admin')->group(function() {
    Route::get('/pratihari-idcard', [PratihariIdcardController::class, 'pratihariIdcard'])->name('admin.pratihariIdcard');
    Route::post('/pratihari-idcard-save', [PratihariIdcardController::class, 'saveIdcard'])->name('admin.pratihari-idcard.store');
});


Route::prefix('admin')->group(function() {
    Route::get('/pratihari-address', [PratihariAddressController::class, 'pratihariAddress'])->name('admin.pratihariAddress');
    Route::post('/pratihari-address-save', [PratihariAddressController::class, 'saveAddress'])->name('admin.pratihari-address.store');
});


Route::prefix('admin')->group(function() {
    Route::get('/pratihari-occupation', [PratihariOccupationController::class, 'pratihariOccupation'])->name('admin.pratihariOccupation');
    Route::post('/pratihari-occupation-save', [PratihariOccupationController::class, 'saveOccupation'])->name('admin.pratihari-occupation.store');
});


Route::prefix('admin')->group(function() {
    Route::get('/pratihari-nijoga-seba', [MasterNijogaSebaController::class, 'pratihariNijogaSeba'])->name('admin.pratihariNijogaSeba');
    Route::post('/pratihari-nijoga-seba-save', [MasterNijogaSebaController::class, 'saveNijogaSeba'])->name('admin.saveNijogaSeba');
    Route::post('/store-seba', [MasterNijogaSebaController::class, 'storeSeba'])->name('admin.storeSeba');
    Route::post('/store-nijoga', [MasterNijogaSebaController::class, 'storeNijoga'])->name('admin.storeNijoga');

    Route::get('/pratihari-seba-beddha', [MasterNijogaSebaController::class, 'pratihariSebaBeddha'])->name('admin.pratihariSebaBeddha');
    Route::post('/store-seba-beddha', [MasterNijogaSebaController::class, 'saveSebaBeddha'])->name('admin.saveSebaBeddha');
    Route::post('/store-beddha', [MasterNijogaSebaController::class, 'storeBeddha'])->name('admin.storeBeddha');
});

Route::prefix('admin')->group(function() {
    Route::get('/pratihari-seba', [PratihariSebaController::class, 'pratihariSeba'])->name('admin.pratihariSeba');
    Route::post('/pratihari-seba-save', [PratihariSebaController::class, 'saveSeba'])->name('admin.pratihari-seba.store');
    Route::get('/get-seba/{nijoga_id}', [PratihariSebaController::class, 'getSebaByNijoga'])->name('admin.getSebaByNijoga');
    Route::get('/get-beddha/{seba_id}', [PratihariSebaController::class, 'getBeddhaBySeba'])->name('admin.getBeddhaBySeba');
});

Route::prefix('admin')->group(function() {
    Route::get('/pratihari-social-media', [PratihariSocialMediaController::class, 'pratihariSocialMedia'])->name('admin.pratihariSocialMedia');
    Route::post('/pratihari-social-media-save', [PratihariSocialMediaController::class, 'saveSocialMedia'])->name('admin.social-media.store');
});


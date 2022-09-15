<?php

use App\Http\Controllers\BackEnd\AdminCategoryController;
use App\Http\Controllers\BackEnd\AdminInforController;
use App\Http\Controllers\BackEnd\AdminLoginController;
use App\Http\Controllers\BackEnd\AdminMenuController;
use App\Http\Controllers\BackEnd\AdminProductController;
use App\Http\Controllers\BackEnd\AdminSettingController;
use App\Http\Controllers\BackEnd\AdminSliderController;
use App\Http\Controllers\BackEnd\AdminSpecificateController;
use App\Http\Controllers\BackEnd\AdminTypeController;
use App\Http\Controllers\BackEnd\DashboardController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function() {
//     return redirect()->route('admin.login');
// });

// Xử lí login
Route::get('/', [AdminLoginController::class, 'admins'])->name('admin.admins');
Route::get('login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('login', [AdminLoginController::class, 'processLogin'])->name('admin.processLogin');

// Xử lí logout
Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');





Route::middleware('admin.auth')->group(function() {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // Setting Infor and change password
    Route::get('setting-info', [AdminInforController::class, 'getSetting'])->name('admin.getSetting');
    Route::post('setting-info', [AdminInforController::class, 'postSetting'])->name('admin.postSetting');

    // Slider
    Route::resource('slider', AdminSliderController::class)->except(['destroy']);
    Route::get('slider/{slider}', [AdminSliderController::class, 'destroy'])->name('slider.destroy');

    // Setting
    Route::resource('setting', AdminSettingController::class)->except(['destroy']);
    Route::get('setting/{setting}', [AdminSettingController::class, 'destroy'])->name('setting.destroy');

    // Menu
    Route::resource('menu', AdminMenuController::class)->except(['destroy']);
    Route::get('menu/{menu}', [AdminMenuController::class, 'destroy'])->name('menu.destroy');

     // Category
     Route::resource('category', AdminCategoryController::class)->except(['destroy']);
     Route::get('category/{category}', [AdminCategoryController::class, 'destroy'])->name('category.destroy');

    // Product
    Route::resource('product', AdminProductController::class)->except(['destroy']);
    Route::get('product/{product}', [AdminProductController::class, 'destroy'])->name('product.destroy');
    // lỗi ko dùng đc get
    Route::post('product/search', [AdminProductController::class, 'search'])->name('product.search');

    //Type
    Route::resource('type', AdminTypeController::class)->except(['destroy']);
    Route::get('type/{type}', [AdminTypeController::class, 'destroy'])->name('type.destroy');
    
    //Specificate
    Route::resource('specId', AdminSpecificateController::class)->except(['destroy']);
    Route::get('specId/{id}', [AdminSpecificateController::class, 'destroy'])->name('specId.destroy');

    

});

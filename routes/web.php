<?php

use App\Http\Controllers\AdminCarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNewsCategoryController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminSliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;


// Route::get('/admin', [AdminController::class, 'loginAdmin'])->name('admin');

// Route::post('/admin', [AdminController::class, 'postAdmin']);
// Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth')->name('home');


// Route::prefix('categories')->group(function () {
//     Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
//     Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
//     Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
//     Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
//     Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
//     Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
// })->middleware('auth');

// Route::prefix('settings')->group(function () {
//     Route::get('/edit', [SettingController::class, 'edit'])->name('settings.edit');
//     Route::post('/update', [SettingController::class, 'update'])->name('settings.update');
// })->middleware('auth');

// Route::prefix('car')->group(function () {
//     Route::get('/', [AdminCarController::class, 'index'])->name('car.index');
//     Route::get('/create', [AdminCarController::class, 'create'])->name('car.create');
//     Route::post('/store', [AdminCarController::class, 'store'])->name('car.store');
//     Route::get('/delete/{id}', [AdminCarController::class, 'delete'])->name('car.delete');
//     Route::get('/edit/{id}', [AdminCarController::class, 'edit'])->name('car.edit');
//     Route::post('/update/{id}', [AdminCarController::class, 'update'])->name('car.update');
// })->middleware('auth');

// Route::prefix('slider')->group(function () {
//     Route::get('/', [AdminSliderController::class, 'index'])->name('slider.index');
//     Route::get('/create', [AdminSliderController::class, 'create'])->name('slider.create');
//     Route::post('/store', [AdminSliderController::class, 'store'])->name('slider.store');
//     Route::get('/delete/{id}', [AdminSliderController::class, 'delete'])->name('slider.delete');
//     Route::get('/edit/{id}', [AdminSliderController::class, 'edit'])->name('slider.edit');
//     Route::post('/update/{id}', [AdminSliderController::class, 'update'])->name('slider.update');
    
// })->middleware('auth');


// Route::prefix('newscategory')->group(function () {
//     Route::get('/', [AdminNewsCategoryController::class, 'index'])->name('newscategory.index');
//     Route::get('/create', [AdminNewsCategoryController::class, 'create'])->name('newscategory.create');
//     Route::post('/store', [AdminNewsCategoryController::class, 'store'])->name('newscategory.store');
//     Route::get('/delete/{id}', [AdminNewsCategoryController::class, 'delete'])->name('newscategory.delete');
//     Route::get('/edit/{id}', [AdminNewsCategoryController::class, 'edit'])->name('newscategory.edit');
//     Route::post('/update/{id}', [AdminNewsCategoryController::class, 'update'])->name('newscategory.update');
    
// })->middleware('auth');


// Route::prefix('news')->group(function () {
//     Route::get('/', [AdminNewsController::class, 'index'])->name('news.index');
//     Route::get('/create', [AdminNewsController::class, 'create'])->name('news.create');
//     Route::post('/store', [AdminNewsController::class, 'store'])->name('news.store');
//     Route::get('/delete/{id}', [AdminNewsController::class, 'delete'])->name('news.delete');
//     Route::get('/edit/{id}', [AdminNewsController::class, 'edit'])->name('news.edit');
//     Route::post('/update/{id}', [AdminNewsController::class, 'update'])->name('news.update');
    
// })->middleware('auth');
// Login - Logout
Route::get('/admin', [AdminController::class, 'loginAdmin'])->name('admin');
Route::post('/admin', [AdminController::class, 'postAdmin']);
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/home', fn() => view('home'))->middleware('auth')->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {

    // Danh mục sản phẩm
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');  // Nếu muốn GET
    });

    // Cài đặt
    Route::prefix('settings')->group(function () {
        Route::get('/edit', [SettingController::class, 'edit'])->name('settings.edit');
        Route::post('/update', [SettingController::class, 'update'])->name('settings.update');
    });

    // Quản lý xe (car)
    Route::prefix('car')->group(function () {
        Route::get('/', [AdminCarController::class, 'index'])->name('car.index');
        Route::get('/create', [AdminCarController::class, 'create'])->name('car.create');
        Route::post('/store', [AdminCarController::class, 'store'])->name('car.store');
        Route::get('/edit/{id}', [AdminCarController::class, 'edit'])->name('car.edit');
        Route::post('/update/{id}', [AdminCarController::class, 'update'])->name('car.update');
        Route::get('/delete/{id}', [AdminCarController::class, 'delete'])->name('car.delete');
    });

    // Quản lý slider
    Route::prefix('slider')->group(function () {
        Route::get('/', [AdminSliderController::class, 'index'])->name('slider.index');
        Route::get('/create', [AdminSliderController::class, 'create'])->name('slider.create');
        Route::post('/store', [AdminSliderController::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}', [AdminSliderController::class, 'edit'])->name('slider.edit');
        Route::post('/update/{id}', [AdminSliderController::class, 'update'])->name('slider.update');
        Route::get('/delete/{id}', [AdminSliderController::class, 'delete'])->name('slider.delete');
    });

    // Danh mục tin tức
    Route::prefix('newscategories')->group(function () {
        Route::get('/', [AdminNewsCategoryController::class, 'index'])->name('newscategory.index');
        Route::get('/create', [AdminNewsCategoryController::class, 'create'])->name('newscategory.create');
        Route::post('/store', [AdminNewsCategoryController::class, 'store'])->name('newscategory.store');
        Route::get('/edit/{id}', [AdminNewsCategoryController::class, 'edit'])->name('newscategory.edit');
        Route::post('/update/{id}', [AdminNewsCategoryController::class, 'update'])->name('newscategory.update');
        Route::get('/delete/{id}', [AdminNewsCategoryController::class, 'delete'])->name('newscategory.delete');
    });

    // Tin tức
    Route::prefix('news')->group(function () {
        Route::get('/', [AdminNewsController::class, 'index'])->name('news.index');
        Route::get('/create', [AdminNewsController::class, 'create'])->name('news.create');
        Route::post('/store', [AdminNewsController::class, 'store'])->name('news.store');
        Route::get('/edit/{id}', [AdminNewsController::class, 'edit'])->name('news.edit');
        Route::post('/update/{id}', [AdminNewsController::class, 'update'])->name('news.update');
        Route::get('/delete/{id}', [AdminNewsController::class, 'delete'])->name('news.delete');
    });

});

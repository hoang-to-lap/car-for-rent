<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;


Route::get('/admin', [AdminController::class, 'loginAdmin'])->name('admin');

Route::post('/admin', [AdminController::class, 'postAdmin']);
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');


Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
})->middleware('auth');
Route::prefix('settings')->group(function () {
    Route::get('/edit', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/update', [SettingController::class, 'update'])->name('settings.update');
})->middleware('auth');
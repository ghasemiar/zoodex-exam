<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Store\StoreController;
use \App\Http\Controllers\Store\AdminStoreController;


Route::get('/store', [StoreController::class, 'index'])->name('store.index');

Route::middleware(['seller'])->prefix('/seller')->name('seller.')->group(function () {
    Route::resource('/store', StoreController::class)->except(['index', 'show']);
});

Route::get('/store/{store}', [StoreController::class, 'show'])->name('store.show');

Route::middleware(['admin'])->prefix('/admin')->name('admin.')->group(function () {
    Route::resource('/store', AdminStoreController::class)->except(['show']);
});

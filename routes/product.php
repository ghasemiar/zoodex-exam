<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\AdminProductController;

Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::middleware(['seller','active.store','approved.store'])->prefix('/seller')->name('seller.')->group(function () {
    Route::resource('/product', ProductController::class)->except(['show','index']);
    Route::get('/product', [ProductController::class,'sellerProductsIndex'])->name('product.index');
});

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/store/{store}/product', [AdminProductController::class, 'indexByStore'])->name('product.indexByStore');
    Route::get('/store/{store}/product/create', [AdminProductController::class, 'createByStore'])->name('product.createByStore');
    Route::post('/store/{store}/product', [AdminProductController::class, 'storeByStore'])->name('product.storeByStore');
    Route::get('/store/product/{product}/edit', [AdminProductController::class, 'editByStore'])->name('product.editByStore');
    Route::patch('/store/product/{product}', [AdminProductController::class, 'updateByStore'])->name('product.updateByStore');
    Route::delete('/product/{product}', [AdminProductController::class, 'destroy'])->name('product.destroy');
});



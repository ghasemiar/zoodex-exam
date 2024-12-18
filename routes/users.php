<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth','admin'])->prefix('/admin')->name('admin.')->group(function () {
    Route::resource('/user', UserController::class)->except(['show']);
});


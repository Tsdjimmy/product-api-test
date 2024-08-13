<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::prefix('v1')->group(function () {

    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register'])
            ->name('auth.register')
            ->middleware('api');

        Route::post('login', [AuthController::class, 'login'])
            ->name('auth.login')
            ->middleware('api');
    });

    Route::prefix('products')->group(function () {
        Route::post('/', [ProductController::class, 'store'])
            ->name('products.store')
            ->middleware('auth:sanctum');

        Route::put('{product}', [ProductController::class, 'update'])
            ->name('products.update')
            ->middleware('auth:sanctum');
    });
});

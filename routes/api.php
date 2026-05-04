<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::middleware('throttle:api')->group(function () {

    Route::prefix('products')->group(function () {

        Route::get('/', [ProductController::class, 'index']);
        Route::get('/low-stock', [ProductController::class, 'lowStock']);
        Route::get('/{product}', [ProductController::class, 'show']);

        Route::post('/', [ProductController::class, 'store']);
        Route::put('/{product}', [ProductController::class, 'update']);
        Route::delete('/{product}', [ProductController::class, 'destroy']);

        Route::post('/{product}/stock', [ProductController::class, 'adjustStock']);
    });

});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::prefix('products')->group(function () {

    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{product}', [ProductController::class, 'show']);
    Route::get('/low-stock', [ProductController::class, 'lowStock']);
    
    Route::post('/', [ProductController::class, 'store']);
    Route::post('/{product}/stock', [ProductController::class, 'adjustStock']);

    Route::put('/{product}', [ProductController::class, 'update']);
    Route::delete('/{product}', [ProductController::class, 'destroy']);

});
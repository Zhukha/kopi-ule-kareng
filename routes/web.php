<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'landing']) 
    ->name('landing'); 
 
Route::resource('product', ProductController::class) 
    ->except(['show']) 
    ->parameters(['product' => 'product']);

// Route::get('/product', [ProductController::class, 'index']);
// Route::get('/product/create', [ProductController::class, 'create']);
// Route::post('/product', [ProductController::class, 'store']);
// Route::get('/product/{product}/edit', [ProductController::class, 'edit']);
// Route::put('/product/{product}', [ProductController::class, 'update']);
// Route::delete('/product/{product}', [ProductController::class, 'destroy']);


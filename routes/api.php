<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Get all products
// Route::get('/products', [ProductController::class, 'index']);

//Get one product
// Route::get('/products/{$id}', [ProductController::class, 'show']);

//Create a product
// Route::post('/products', [ProductController::class, 'store']);

Route::resource('products', ProductController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

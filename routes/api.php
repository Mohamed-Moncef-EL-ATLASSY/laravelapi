<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Get all products
// Route::get('/products', [ProductController::class, 'index']);

// Get one product
// Route::get('/products/{$id}', [ProductController::class, 'show']);

//Create a product
// Route::post('/products', [ProductController::class, 'store']);

Route::resource('products', ProductController::class);

// Search by product name
Route::get('/products/searchByName/{productName}', [ProductController::class, 'searchByProductName']);

// // Search by product id
// Route::get('/products/searchById/{id}', [ProductController::class, 'searchByProductId']);

//Protect
Route::group (['middleware' => ['auth:sanctum']] , function () {

    // Search by product id
    Route::get('/products/searchById/{id}', [ProductController::class, 'searchByProductId']);

});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

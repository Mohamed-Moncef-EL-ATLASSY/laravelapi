<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Public routes
Route::resource('products', ProductController::class);

//Protected routes
Route::group (['middleware' => ['auth:sanctum']] , function () {

    // Search by product id
    Route::get('/products/searchById/{id}', [ProductController::class, 'searchByProductId']);

    // Search by product name
    Route::get('/products/searchByName/{productName}', [ProductController::class, 'searchByProductName']);

});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

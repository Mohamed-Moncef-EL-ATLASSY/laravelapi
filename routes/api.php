<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Public routes

////Get one product
Route::get('/products/{$id}', [ProductController::class, 'show']);

////Get all products
Route::get('/products', [ProductController::class, 'index']);

////Search by product id
Route::get('/products/searchById/{id}', [ProductController::class, 'searchByProductId']);

////Search by product name
Route::get('/products/searchByName/{productName}', [ProductController::class, 'searchByProductName']);


//Protected routes
Route::group (['middleware' => ['auth:sanctum']] , function () {

    //Create a product
    Route::post('/products', [ProductController::class, 'store']);

});





// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::resource('products', ProductController::class);

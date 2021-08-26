<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//Public routes

////Register
Route::post('/register', [AuthController::class, 'userRegister']);

////Login
Route::post('/login', [AuthController::class, 'userLogin']);

////Get all products
Route::get('/products', [ProductController::class, 'index']);

////Get one product
Route::get('/products/{id}', [ProductController::class, 'show']);

////Search by product id
Route::get('/products/searchById/{id}', [ProductController::class, 'searchByProductId']);

////Search by product name
Route::get('/products/searchByName/{productName}', [ProductController::class, 'searchByProductName']);



//Protected routes
Route::group (['middleware' => ['auth:sanctum']] , function () {

    //Create a product
    Route::post('/products', [ProductController::class, 'store']);

    //Update a product
    Route::put('/products/{id}', [ProductController::class, 'update']);

    //Delete a product
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    //Logout
    Route::post('/logout', [AuthController::class, 'userLogout']);

});





// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::resource('products', ProductController::class);

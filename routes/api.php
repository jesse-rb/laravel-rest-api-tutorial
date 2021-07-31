<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::resource('products', ProductController::class); // All standard crud routes

//
// Public routes
//

// Product routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);

// Seller routes
Route::get('/sellers', [SellerController::class, 'index']);
Route::get('/sellers/{id}', [SellerController::class, 'show']);
Route::get('/sellers/search/{name}', [SellerController::class, 'search']);

// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//
// Protected routes (through sanctum )
//
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Product routes
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    // Seller routes
    Route::post('/sellers', [SellerController::class, 'store']);
    Route::put('/sellers/{id}', [SellerController::class, 'update']);
    Route::delete('/sellers/{id}', [SellerController::class, 'destroy']);

    // Auth routes
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

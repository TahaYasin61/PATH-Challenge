<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[\App\Http\Controllers\Api\UserController::class,'login'])->name('login');

Route::post('/add-to-cart',[\App\Http\Controllers\Api\ShoppingCartController::class,'addProductToCart'])->name('add-to-cart');
Route::post('/confirm-cart',[\App\Http\Controllers\Api\ShoppingCartController::class,'confirmCart'])->name('confirm-cart');

Route::post('/ship-order',[\App\Http\Controllers\Api\OrderController::class,'shipOrder'])->name('ship-order');
Route::post('/order-detail',[\App\Http\Controllers\Api\OrderController::class,'orderDetail'])->name('order-detail');
Route::get('/all-orders',[\App\Http\Controllers\Api\OrderController::class,'allOrders'])->name('all-orders');
Route::post('/update-order',[\App\Http\Controllers\Api\OrderController::class,'updateOrder'])->name('update-order');

<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'is_customer'])->group(function(){
    Route::patch('update/{user}', [AuthController::class, 'updateUser']);
    Route::get('orders', [OrderController::class, 'getOrders']);
    Route::post('order', [OrderController::class, 'createOrder']);
    Route::post('order/{order}', [OrderController::class, 'cancelOrder']);
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

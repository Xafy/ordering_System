<?php

use App\Http\Controllers\Admin\ActivationController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\ServiceProvider\AuthController as ServiceProviderAuthController;
use App\Http\Controllers\ServiceProvider\OrderController as ServiceProviderOrderController;
use App\Http\Controllers\ServiceProvider\ServiceController;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'is_customer'])->group(function(){
    Route::patch('update/{user}', [AuthController::class, 'updateUser']);
    Route::get('orders', [OrderController::class, 'getOrders']);
    Route::post('order', [OrderController::class, 'createOrder']);
    Route::post('order/{order}', [OrderController::class, 'cancelOrder']);
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

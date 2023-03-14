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

// Route::middleware(['auth:sanctum', 'is_service_provider'])->group(function(){
//     Route::get('orders', [ServiceProviderOrderController::class, 'getOrders']);
//     Route::patch('provider/{user}', [ServiceProviderAuthController::class, 'updateUser']);
//     Route::post('provider/service', [ServiceController::class, 'createService']);
//     Route::patch('provider/service/{service}', [ServiceController::class, 'updateService']);
// });

// Route::middleware(['auth:sanctum', 'is_admin'])->group(function(){
//     Route::get('users/all', [UserController::class, 'getUsers']);
//     Route::get('users/customers', [UserController::class, 'getCustomers']);
//     Route::get('users/providers', [UserController::class, 'getServiceProviders']);
//     Route::get('orders', [AdminOrderController::class, 'viewOrders']);
//     Route::delete('users/{user}', [UserController::class, 'deleteUser']);
//     Route::delete('orders/{order}', [AdminOrderController::class, 'deleteOrder']);
//     Route::post('activate/{user}', [ActivationController::class, 'acivateProvider']);
//     Route::post('deactivate/{user}', [ActivationController::class, 'deacivateProvider']);
// });

// Route::post('login', [AuthController::class, 'login']);
// Route::post('register', [AuthController::class, 'register']);
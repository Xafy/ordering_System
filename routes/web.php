<?php

use App\Http\Controllers\Admin\ActivationController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ServiceProvider\AuthController;
use App\Http\Controllers\ServiceProvider\OrderController;
use App\Http\Controllers\ServiceProvider\ServiceController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "is_guest"], function(){
    Route::get('admin/login', [AdminAuthController::class, 'adminLoginForm'])->name('admin.loginForm');
    Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::view('users/login', 'users.login')->name('users.login');
    Route::view('users/register', 'users.register')->name('users.register');
    Route::post('login', [AuthController::class, 'login'])->name('users.handleLogin');
    Route::post('register', [AuthController::class, 'register'])->name('users.handleRegister');
});

Route::redirect('/', 'users/register');
Route::get('logout', [AuthController::class, 'logout'])->name('users.logout');


Route::middleware(['is_admin'])->group(function(){
    Route::get('users/all', [UserController::class, 'getUsers'])->name('users.all');
    Route::get('users/customers', [UserController::class, 'getCustomers'])->name('users.customers');
    Route::get('users/providers', [UserController::class, 'getServiceProviders'])->name('users.providers');
    Route::get('users/{user}', [UserController::class, 'deleteUser'])->name(('users.delete'));
    Route::get('orders/all', [AdminOrderController::class, 'viewOrders'])->name('orders.all');
    Route::get('orders/{order}', [AdminOrderController::class, 'deleteOrder'])->name('orders.delete');
    Route::get('activate/{user}', [ActivationController::class, 'acivateProvider'])->name('users.activate');
    Route::get('deactivate/{user}', [ActivationController::class, 'deacivateProvider'])->name('users.deactivate');
});

Route::middleware(['is_service_provider'])->group(function(){
    Route::get('users/edit/{user}', [AuthController::class, 'editForm'])->name('users.edit');
    Route::patch('users/{user}', [AuthController::class, 'updateUser'])->name('users.handleUpdate');    
    Route::get('services', [ServiceController::class, 'viewServices'])->name('services.index');
    Route::view('services/create', 'services.create')->name('services.create');
    Route::get('services/update/{service}', [ServiceController::class, 'updateForm'])->name('services.update');
    Route::post('services', [ServiceController::class, 'createService'])->name('services.createHandler');
    Route::patch('services/{service}', [ServiceController::class, 'updateService'])->name('services.updateHandler');
    Route::get('orders', [OrderController::class, 'getOrders'])->name('orders.index');
});




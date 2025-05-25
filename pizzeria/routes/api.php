<?php

use App\Http\Controllers\api\UsersController;
use App\Http\Controllers\api\ClientsController;
use App\Http\Controllers\api\OrdenController;
use App\Http\Controllers\api\EmployesController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas de orders
Route::get('/orders', [OrdenController::class, 'index'])->name('orders');
Route::post('/orders', [OrdenController::class, 'store'])->name('orders.store');
Route::get('/orders/{comuna}', [OrdenController::class, 'show'])->name('orders.show');
Route::put('/orders/{comuna}', [OrdenController::class, 'update'])->name('orders.update');
Route::delete('/orders/{comuna}', [OrdenController::class, 'destroy'])->name('orders.destroy');

//Rutas de users
Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

// Rutas de clients
Route::get('/clients', [ClientsController::class, 'index'])->name('clients');
Route::post('/clients', [ClientsController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}', [ClientsController::class, 'show'])->name('clients.show');
Route::put('/clients/{client}', [ClientsController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');

// Rutas de employees
Route::get('/employees', [EmployesController::class, 'index'])->name('employees');
Route::post('/employees', [EmployesController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}', [EmployesController::class, 'show'])->name('employees.show');
Route::put('/employees/{employee}', [EmployesController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [EmployesController::class, 'destroy'])->name('employees.destroy');

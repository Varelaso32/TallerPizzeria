<?php

use App\Http\Controllers\api\UsersController;
use App\Http\Controllers\api\OrdenController;
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
<?php

use App\Http\Controllers\api\OrdenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/orders', [OrdenController::class, 'index'])->name('orders');
Route::post('/orders', [OrdenController::class, 'store'])->name('orders.store');
Route::get('/orders/{comuna}', [OrdenController::class, 'show'])->name('orders.show');
Route::put('/orders/{comuna}', [OrdenController::class, 'update'])->name('orders.update');
Route::delete('/orders/{comuna}', [OrdenController::class, 'destroy'])->name('orders.destroy');

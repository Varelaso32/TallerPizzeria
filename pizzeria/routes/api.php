<?php

use App\Http\Controllers\api\UsersController;
use App\Http\Controllers\api\ClientsController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\PizzaRawMaterialController;
use App\Http\Controllers\api\EmployesController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas de branchs
Route::get('/branchs', [OrderController::class, 'index'])->name('branch');
Route::post('/branchs', [OrderController::class, 'store'])->name('branch.store');
Route::get('/branchs/{branch}', [OrderController::class, 'show'])->name('branch.show');
Route::put('/branchs/{branch}', [OrderController::class, 'update'])->name('branch.update');
Route::delete('/branchs/{branch}', [OrderController::class, 'destroy'])->name('orders.destroy');

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

// Rutas de extra_ingredients
Route::get('/extra_ingredients', [OrderController::class, 'index'])->name('extra_ingredients');
Route::post('/extra_ingredients', [OrderController::class, 'store'])->name('extra_ingredients.store');
Route::get('/extra_ingredients/{extra_ingredient}', [OrderController::class, 'show'])->name('extra_ingredients.show');
Route::put('/extra_ingredients/{extra_ingredient}', [OrderController::class, 'update'])->name('extra_ingredients.update');
Route::delete('/extra_ingredients/{extra_ingredient}', [OrderController::class, 'destroy'])->name('extra_ingredients.destroy');

// Rutas de orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

// Rutas de order_extra_ingredients
Route::get('/order_extra_ingredients', [OrderController::class, 'index'])->name('order_extra_ingredients');
Route::post('/order_extra_ingredients', [OrderController::class, 'store'])->name('order_extra_ingredients.store');
Route::get('/order_extra_ingredients/{order_extra_ingredient}', [OrderController::class, 'show'])->name('order_extra_ingredients.show');
Route::put('/order_extra_ingredients/{order_extra_ingredient}', [OrderController::class, 'update'])->name('order_extra_ingredients.update');
Route::delete('/order_extra_ingredients/{order_extra_ingredient}', [OrderController::class, 'destroy'])->name('order_extra_ingredients.destroy');

// Rutas de pizza_ingredients
Route::get('/pizza_ingredients', [OrderController::class, 'index'])->name('pizza_ingredients');
Route::post('/pizza_ingredients', [OrderController::class, 'store'])->name('pizza_ingredients.store');
Route::get('/pizza_ingredients/{pizza_ingredient}', [OrderController::class, 'show'])->name('pizza_ingredients.show');
Route::put('/pizza_ingredients/{pizza_ingredient}', [OrderController::class, 'update'])->name('pizza_ingredients.update');
Route::delete('/pizza_ingredients/{pizza_ingredient}', [OrderController::class, 'destroy'])->name('pizza_ingredients.destroy');

// Rutas de pizza raw materials
Route::get('/pizza-raw-materials', [PizzaRawMaterialController::class, 'index'])->name('pizza-raw-materials');
Route::post('/pizza-raw-materials', [PizzaRawMaterialController::class, 'store'])->name('pizza-raw-materials.store');
Route::get('/pizza-raw-materials/{id}', [PizzaRawMaterialController::class, 'show'])->name('pizza-raw-materials.show');
Route::put('/pizza-raw-materials/{id}', [PizzaRawMaterialController::class, 'update'])->name('pizza-raw-materials.update');
Route::delete('/pizza-raw-materials/{id}', [PizzaRawMaterialController::class, 'destroy'])->name('pizza-raw-materials.destroy');

//Rutas de users
Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

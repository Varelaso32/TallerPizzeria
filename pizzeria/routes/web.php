<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PizzasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Rutas para Usuarios
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');

// Rutas para Pizzas
Route::get('/pizzas', [PizzasController::class, 'index'])->name('pizzas.index');
Route::post('/pizzas', [PizzasController::class, 'store'])->name('pizzas.store');
Route::get('/pizzas/create', [PizzasController::class, 'create'])->name('pizzas.create');
Route::delete('/pizzas/{pizza}', [PizzasController::class, 'destroy'])->name('pizzas.destroy');
Route::put('/pizzas/{pizza}', [PizzasController::class, 'update'])->name('pizzas.update');
Route::get('/pizzas/{pizza}/edit', [PizzasController::class, 'edit'])->name('pizzas.edit');

//rutas para ingresientes
Route::get('/ingredients', [IngredientsController::class, 'index'])->name('ingredients.index');
Route::post('/ingredients', [IngredientsController::class, 'store'])->name('ingredients.store');
Route::get('/ingredients/create', [IngredientsController::class, 'create'])->name('ingredients.create');
Route::delete('/ingredients/{ingredient}', [IngredientsController::class, 'destroy'])->name('ingredients.destroy');
Route::put('/ingredients/{ingredient}', [IngredientsController::class, 'update'])->name('ingredients.update');
Route::get('/ingredients/{ingredient}/edit', [IngredientsController::class, 'edit'])->name('ingredients.edit');

//ruta para pizas_Sizes
Route::get('/pizzas_sizes', [PizzaSizeController::class, 'index'])->name('pizzas_sizes.index');
Route::post('/pizzas_sizes', [PizzaSizeController::class, 'store'])->name('pizzas_sizes.store');
Route::get('/pizzas_sizes/create', [PizzaSizeController::class, 'create'])->name('pizzas_sizes.create');
Route::delete('/pizzas_sizes/{pizza_size}', [PizzaSizeController::class, 'destroy'])->name('pizzas_sizes.destroy');
Route::put('/pizzas_sizes/{pizza_size}', [PizzaSizeController::class, 'update'])->name('pizzas_sizes.update');
Route::get('/pizzas_sizes/{pizza_size}/edit', [PizzaSizeController::class, 'edit'])->name('pizzas_sizes.edit');
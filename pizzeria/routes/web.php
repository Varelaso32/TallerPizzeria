<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\pizzasControler;
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
Route::get('/pizzas', [pizzasControler::class, 'index'])->name('pizzas.index');
Route::post('/pizzas', [pizzasControler::class, 'store'])->name('pizzas.store');
Route::get('/pizzas/create', [pizzasControler::class, 'create'])->name('pizzas.create');
Route::delete('/pizzas/{pizza}', [pizzasControler::class, 'destroy'])->name('pizzas.destroy');
Route::put('/pizzas/{pizza}', [pizzasControler::class, 'update'])->name('pizzas.update');
Route::get('/pizzas/{pizza}/edit', [pizzasControler::class, 'edit'])->name('pizzas.edit');
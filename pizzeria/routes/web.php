<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\EmployesController;
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

// Rutas para Clientes
Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');
Route::post('/clients', [ClientsController::class, 'store'])->name('clients.store');
Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');
Route::delete('/clients/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');
Route::put('/clients/{client}', [ClientsController::class, 'update'])->name('clients.update');
Route::get('/clients/{client}/edit', [ClientsController::class, 'edit'])->name('clients.edit');

// Rutas para Employees
Route::get('/employees', [EmployesController::class, 'index'])->name('employees.index');
Route::post('/employees', [EmployesController::class, 'store'])->name('employees.store');
Route::get('/employees/create', [EmployesController::class, 'create'])->name('employees.create');
Route::delete('/employees/{employee}', [EmployesController::class, 'destroy'])->name('employees.destroy');
Route::put('/employees/{employee}', [EmployesController::class, 'update'])->name('employees.update');
Route::get('/employees/{employee}/edit', [EmployesController::class, 'edit'])->name('employees.edit');

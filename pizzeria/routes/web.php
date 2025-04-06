<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PizzasController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PizzaSizeController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::get('/', function () {
    return view('welcome');
});

// Rutas autenticadas
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Perfil de usuario
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Gestión de Usuarios (protegido por auth)
    Route::prefix('users')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/', [UsersController::class, 'store'])->name('users.store');
        Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UsersController::class, 'update'])->name('users.update');
        Route::delete('/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
    });

    // Gestión de Pizzas (protegido por auth)
    Route::prefix('pizzas')->group(function () {
        Route::get('/', [PizzasController::class, 'index'])->name('pizzas.index');
        Route::get('/create', [PizzasController::class, 'create'])->name('pizzas.create');
        Route::post('/', [PizzasController::class, 'store'])->name('pizzas.store');
        Route::get('/{pizza}', [PizzasController::class, 'show'])->name('pizzas.show');
        Route::get('/{pizza}/edit', [PizzasController::class, 'edit'])->name('pizzas.edit');
        Route::put('/{pizza}', [PizzasController::class, 'update'])->name('pizzas.update');
        Route::delete('/{pizza}', [PizzasController::class, 'destroy'])->name('pizzas.destroy');
    });

    // Gestión de Ingredientes (protegido por auth)
    Route::prefix('ingredient')->group(function () {
        Route::get('/', [IngredientController::class, 'index'])->name('ingredient.index');
        Route::get('/create', [IngredientController::class, 'create'])->name('ingredient.create');
        Route::post('/', [IngredientController::class, 'store'])->name('ingredient.store');
        Route::get('/{ingredient}/edit', [IngredientController::class, 'edit'])->name('ingredient.edit');
        Route::put('/{ingredient}', [IngredientController::class, 'update'])->name('ingredient.update');
        Route::delete('/{ingredient}', [IngredientController::class, 'destroy'])->name('ingredient.destroy');
    });

        Route::get('pizza-size', [PizzaSizeController::class, 'index'])->name('pizza-size.index'); 
        Route::get('pizza-size/create', [PizzaSizeController::class, 'create'])->name('pizza-size.create'); 
        Route::post('pizza-size', [PizzaSizeController::class, 'store'])->name('pizza-size.store'); 

        Route::get('pizza-size/{pizzaSize}', [PizzaSizeController::class, 'show'])->name('pizza-size.show'); 
        Route::get('pizza-size/{pizzaSize}/edit', [PizzaSizeController::class, 'edit'])->name('pizza-size.edit'); 
        Route::put('pizza-size/{pizzaSize}', [PizzaSizeController::class, 'update'])->name('pizza-size.update'); 

        Route::delete('pizza-size/{pizzaSize}', [PizzaSizeController::class, 'destroy'])->name('pizza-size.destroy');

        Route::get('/pizza_ingredient', [PizzaIngredientController::class, 'index'])->name('pizza_ingredient.index');
        Route::post('/pizza_ingredient', [PizzaIngredientController::class, 'store'])->name('pizza_ingredient.store');
        Route::get('/pizza_ingredient/create', [PizzaIngredientController::class, 'create'])->name('pizza_ingredient.create');
        Route::delete('/pizza_ingredient/{pizza_ingredient}', [PizzaIngredientController::class, 'destroy'])->name('pizza_ingredient.destroy');
        Route::put('/pizza_ingredient/{pizza_ingredient}', [PizzaIngredientController::class, 'update'])->name('pizza_ingredient.update');
        Route::get('/pizza_ingredient/{pizza_ingredient}/edit', [PizzaIngredientController::class, 'edit'])->name('pizza_ingredient.edit');
});





 // Pizzas
 Route::resource('pizzas', PizzasController::class);
    
 // Ingredientes
 Route::resource('ingredient', IngredientController::class)->except(['show']);
 
 // Tamaños de pizza
 Route::resource('pizza-size', PizzaSizeController::class)->except(['show']);
// Rutas de autenticación
require __DIR__.'/auth.php';
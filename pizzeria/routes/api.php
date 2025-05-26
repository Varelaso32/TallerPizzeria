<?php

use App\Http\Controllers\api\BranchController;
use App\Http\Controllers\api\ClientsController;
use App\Http\Controllers\api\ExtraIngredientController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\OrderExtraIngredientController;
use App\Http\Controllers\api\OrderPizzaController;
use App\Http\Controllers\api\PizzaIngredientController;
use App\Http\Controllers\api\PizzaRawMaterialController;
use App\Http\Controllers\api\PizzasController;
use App\Http\Controllers\api\SuppliersController;
use App\Http\Controllers\api\UsersController;
use App\Http\Controllers\api\PurchaseController;
use App\Http\Controllers\api\PizzaSizeController;
use App\Http\Controllers\api\EmployesController;
use App\Http\Controllers\api\RawMaterialsController;
use App\Http\Controllers\api\IngredientController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas de branchs
Route::get('/branchs', [BranchController::class, 'index'])->name('branch')->middleware('auth:sanctum');
Route::post('/branchs', [BranchController::class, 'store'])->name('branch.store')->middleware('auth:sanctum');
Route::get('/branchs/{branch}', [BranchController::class, 'show'])->name('branch.show')->middleware('auth:sanctum');
Route::put('/branchs/{branch}', [BranchController::class, 'update'])->name('branch.update')->middleware('auth:sanctum');
Route::delete('/branchs/{branch}', [BranchController::class, 'destroy'])->name('orders.destroy')->middleware('auth:sanctum');

// Rutas de clients
Route::get('/clients', [ClientsController::class, 'index'])->name('clients')->middleware('auth:sanctum');
Route::post('/clients', [ClientsController::class, 'store'])->name('clients.store')->middleware('auth:sanctum');
Route::get('/clients/{client}', [ClientsController::class, 'show'])->name('clients.show')->middleware('auth:sanctum');
Route::put('/clients/{client}', [ClientsController::class, 'update'])->name('clients.update')->middleware('auth:sanctum');
Route::delete('/clients/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy')->middleware('auth:sanctum');

// Rutas de employees
Route::get('/employees', [EmployesController::class, 'index'])->name('employees')->middleware('auth:sanctum');
Route::post('/employees', [EmployesController::class, 'store'])->name('employees.store')->middleware('auth:sanctum');
Route::get('/employees/{employee}', [EmployesController::class, 'show'])->name('employees.show')->middleware('auth:sanctum');
Route::put('/employees/{employee}', [EmployesController::class, 'update'])->name('employees.update')->middleware('auth:sanctum');
Route::delete('/employees/{employee}', [EmployesController::class, 'destroy'])->name('employees.destroy')->middleware('auth:sanctum');

// Rutas de extra_ingredients
Route::get('/extra_ingredients', [ExtraIngredientController::class, 'index'])->name('extra_ingredients')->middleware('auth:sanctum');
Route::post('/extra_ingredients', [ExtraIngredientController::class, 'store'])->name('extra_ingredients.store')->middleware('auth:sanctum');
Route::get('/extra_ingredients/{extra_ingredient}', [ExtraIngredientController::class, 'show'])->name('extra_ingredients.show')->middleware('auth:sanctum');
Route::put('/extra_ingredients/{extra_ingredient}', [ExtraIngredientController::class, 'update'])->name('extra_ingredients.update')->middleware('auth:sanctum');
Route::delete('/extra_ingredients/{extra_ingredient}', [ExtraIngredientController::class, 'destroy'])->name('extra_ingredients.destroy')->middleware('auth:sanctum');

// Rutas de orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders')->middleware('auth:sanctum');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store')->middleware('auth:sanctum');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show')->middleware('auth:sanctum');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update')->middleware('auth:sanctum');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy')->middleware('auth:sanctum');

// Rutas de order_extra_ingredients
Route::get('/order_extra_ingredients', [OrderExtraIngredientController::class, 'index'])->name('order_extra_ingredients')->middleware('auth:sanctum');
Route::post('/order_extra_ingredients', [OrderExtraIngredientController::class, 'store'])->name('order_extra_ingredients.store')->middleware('auth:sanctum');
Route::get('/order_extra_ingredients/{order_extra_ingredient}', [OrderExtraIngredientController::class, 'show'])->name('order_extra_ingredients.show')->middleware('auth:sanctum');
Route::put('/order_extra_ingredients/{order_extra_ingredient}', [OrderExtraIngredientController::class, 'update'])->name('order_extra_ingredients.update')->middleware('auth:sanctum');
Route::delete('/order_extra_ingredients/{order_extra_ingredient}', [OrderExtraIngredientController::class, 'destroy'])->name('order_extra_ingredients.destroy')->middleware('auth:sanctum');

// Rutas de order_pizzas
Route::get('/order_pizzas', [OrderPizzaController::class, 'index'])->name('order_pizzas')->middleware('auth:sanctum');
Route::post('/order_pizzas', [OrderPizzaController::class, 'store'])->name('order_pizzas.store')->middleware('auth:sanctum');
Route::get('/order_pizzas/{order_pizza}', [OrderPizzaController::class, 'show'])->name('order_pizzas.show')->middleware('auth:sanctum');
Route::put('/order_pizzas/{order_pizza}', [OrderPizzaController::class, 'update'])->name('order_pizzas.update')->middleware('auth:sanctum');
Route::delete('/order_pizzas/{order_pizza}', [OrderPizzaController::class, 'destroy'])->name('order_pizzas.destroy')->middleware('auth:sanctum');

// Rutas de pizza_ingredients
Route::get('/pizza_ingredients', [PizzaIngredientController::class, 'index'])->name('pizza_ingredients')->middleware('auth:sanctum');
Route::post('/pizza_ingredients', [PizzaIngredientController::class, 'store'])->name('pizza_ingredients.store')->middleware('auth:sanctum');
Route::get('/pizza_ingredients/{pizza_ingredient}', [PizzaIngredientController::class, 'show'])->name('pizza_ingredients.show')->middleware('auth:sanctum');
Route::put('/pizza_ingredients/{pizza_ingredient}', [PizzaIngredientController::class, 'update'])->name('pizza_ingredients.update')->middleware('auth:sanctum');
Route::delete('/pizza_ingredients/{pizza_ingredient}', [PizzaIngredientController::class, 'destroy'])->name('pizza_ingredients.destroy')->middleware('auth:sanctum');

// Rutas de pizza raw materials
Route::get('/pizza-raw-materials', [PizzaRawMaterialController::class, 'index'])->name('pizza-raw-materials')->middleware('auth:sanctum');
Route::post('/pizza-raw-materials', [PizzaRawMaterialController::class, 'store'])->name('pizza-raw-materials.store')->middleware('auth:sanctum');
Route::get('/pizza-raw-materials/{id}', [PizzaRawMaterialController::class, 'show'])->name('pizza-raw-materials.show')->middleware('auth:sanctum');
Route::put('/pizza-raw-materials/{id}', [PizzaRawMaterialController::class, 'update'])->name('pizza-raw-materials.update')->middleware('auth:sanctum');
Route::delete('/pizza-raw-materials/{id}', [PizzaRawMaterialController::class, 'destroy'])->name('pizza-raw-materials.destroy')->middleware('auth:sanctum');

//Rutas de pizzas
Route::get('/pizzas', [PizzasController::class, 'index'])->name('pizzas')->middleware('auth:sanctum');
Route::post('/pizzas', [PizzasController::class, 'store'])->name('pizzas.store')->middleware('auth:sanctum');
Route::get('/pizzas/{pizza}', [PizzasController::class, 'show'])->name('pizzas.show')->middleware('auth:sanctum');
Route::put('/pizzas/{pizza}', [PizzasController::class, 'update'])->name('pizzas.update')->middleware('auth:sanctum');
Route::delete('/pizzas/{pizza}', [PizzasController::class, 'destroy'])->name('pizzas.destroy')->middleware('auth:sanctum');

//Rutas de users
Route::get('/users', [UsersController::class, 'index'])->name('users')->middleware('auth:sanctum');
Route::post('/users', [UsersController::class, 'store'])->name('users.store')->middleware('auth:sanctum');
Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show')->middleware('auth:sanctum');
Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update')->middleware('auth:sanctum');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy')->middleware('auth:sanctum');

// Rutas de purchases
Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases')->middleware('auth:sanctum');
Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchases.store')->middleware('auth:sanctum');
Route::get('/purchases/{id}', [PurchaseController::class, 'show'])->name('purchases.show')->middleware('auth:sanctum');
Route::put('/purchases/{id}', [PurchaseController::class, 'update'])->name('purchases.update')->middleware('auth:sanctum');
Route::delete('/purchases/{id}', [PurchaseController::class, 'destroy'])->name('purchases.destroy')->middleware('auth:sanctum');

// Rutas de raw materials
Route::get('/raw-materials', [RawMaterialsController::class, 'index'])->name('raw-materials')->middleware('auth:sanctum');
Route::post('/raw-materials', [RawMaterialsController::class, 'store'])->name('raw-materials.store')->middleware('auth:sanctum');
Route::get('/raw-materials/{id}', [RawMaterialsController::class, 'show'])->name('raw-materials.show')->middleware('auth:sanctum');
Route::put('/raw-materials/{id}', [RawMaterialsController::class, 'update'])->name('raw-materials.update')->middleware('auth:sanctum');
Route::delete('/raw-materials/{id}', [RawMaterialsController::class, 'destroy'])->name('raw-materials.destroy')->middleware('auth:sanctum');

// Rutas de suppliers
Route::get('/suppliers', [SuppliersController::class, 'index'])->name('suppliers')->middleware('auth:sanctum');
Route::post('/suppliers', [SuppliersController::class, 'store'])->name('suppliers.store')->middleware('auth:sanctum');
Route::get('/suppliers/{id}', [SuppliersController::class, 'show'])->name('suppliers.show')->middleware('auth:sanctum');
Route::put('/suppliers/{id}', [SuppliersController::class, 'update'])->name('suppliers.update')->middleware('auth:sanctum');
Route::delete('/suppliers/{id}', [SuppliersController::class, 'destroy'])->name('suppliers.destroy')->middleware('auth:sanctum');

// Rutas de pizza_sizes
Route::get('/pizza-sizes', [PizzaSizeController::class, 'index'])->name('pizza-sizes')->middleware('auth:sanctum');
Route::post('/pizza-sizes', [PizzaSizeController::class, 'store'])->name('pizza-sizes.store')->middleware('auth:sanctum');
Route::get('/pizza-sizes/{id}', [PizzaSizeController::class, 'show'])->name('pizza-sizes.show')->middleware('auth:sanctum');
Route::put('/pizza-sizes/{id}', [PizzaSizeController::class, 'update'])->name('pizza-sizes.update')->middleware('auth:sanctum');
Route::delete('/pizza-sizes/{id}', [PizzaSizeController::class, 'destroy'])->name('pizza-sizes.destroy')->middleware('auth:sanctum');

// Rutas de ingredients
Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients')->middleware('auth:sanctum');
Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store')->middleware('auth:sanctum');
Route::get('/ingredients/{id}', [IngredientController::class, 'show'])->name('ingredients.show')->middleware('auth:sanctum');
Route::put('/ingredients/{id}', [IngredientController::class, 'update'])->name('ingredients.update')->middleware('auth:sanctum');
Route::delete('/ingredients/{id}', [IngredientController::class, 'destroy'])->name('ingredients.destroy')->middleware('auth:sanctum');

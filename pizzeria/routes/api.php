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

// Rutas de branchs
Route::get('/branchs', [BranchController::class, 'index'])->name('branch');
Route::post('/branchs', [BranchController::class, 'store'])->name('branch.store');
Route::get('/branchs/{branch}', [BranchController::class, 'show'])->name('branch.show');
Route::put('/branchs/{branch}', [BranchController::class, 'update'])->name('branch.update');
Route::delete('/branchs/{branch}', [BranchController::class, 'destroy'])->name('orders.destroy');

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
Route::get('/extra_ingredients', [ExtraIngredientController::class, 'index'])->name('extra_ingredients');
Route::post('/extra_ingredients', [ExtraIngredientController::class, 'store'])->name('extra_ingredients.store');
Route::get('/extra_ingredients/{extra_ingredient}', [ExtraIngredientController::class, 'show'])->name('extra_ingredients.show');
Route::put('/extra_ingredients/{extra_ingredient}', [ExtraIngredientController::class, 'update'])->name('extra_ingredients.update');
Route::delete('/extra_ingredients/{extra_ingredient}', [ExtraIngredientController::class, 'destroy'])->name('extra_ingredients.destroy');

// Rutas de orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

// Rutas de order_extra_ingredients
Route::get('/order_extra_ingredients', [OrderExtraIngredientController::class, 'index'])->name('order_extra_ingredients');
Route::post('/order_extra_ingredients', [OrderExtraIngredientController::class, 'store'])->name('order_extra_ingredients.store');
Route::get('/order_extra_ingredients/{order_extra_ingredient}', [OrderExtraIngredientController::class, 'show'])->name('order_extra_ingredients.show');
Route::put('/order_extra_ingredients/{order_extra_ingredient}', [OrderExtraIngredientController::class, 'update'])->name('order_extra_ingredients.update');
Route::delete('/order_extra_ingredients/{order_extra_ingredient}', [OrderExtraIngredientController::class, 'destroy'])->name('order_extra_ingredients.destroy');

// Rutas de order_pizzas
Route::get('/order_pizzas', [OrderPizzaController::class, 'index'])->name('order_pizzas');
Route::post('/order_pizzas', [OrderPizzaController::class, 'store'])->name('order_pizzas.store');
Route::get('/order_pizzas/{order_pizza}', [OrderPizzaController::class, 'show'])->name('order_pizzas.show');
Route::put('/order_pizzas/{order_pizza}', [OrderPizzaController::class, 'update'])->name('order_pizzas.update');
Route::delete('/order_pizzas/{order_pizza}', [OrderPizzaController::class, 'destroy'])->name('order_pizzas.destroy');

// Rutas de pizza_ingredients
Route::get('/pizza_ingredients', [PizzaIngredientController::class, 'index'])->name('pizza_ingredients');
Route::post('/pizza_ingredients', [PizzaIngredientController::class, 'store'])->name('pizza_ingredients.store');
Route::get('/pizza_ingredients/{pizza_ingredient}', [PizzaIngredientController::class, 'show'])->name('pizza_ingredients.show');
Route::put('/pizza_ingredients/{pizza_ingredient}', [PizzaIngredientController::class, 'update'])->name('pizza_ingredients.update');
Route::delete('/pizza_ingredients/{pizza_ingredient}', [PizzaIngredientController::class, 'destroy'])->name('pizza_ingredients.destroy');

// Rutas de pizza raw materials
Route::get('/pizza-raw-materials', [PizzaRawMaterialController::class, 'index'])->name('pizza-raw-materials');
Route::post('/pizza-raw-materials', [PizzaRawMaterialController::class, 'store'])->name('pizza-raw-materials.store');
Route::get('/pizza-raw-materials/{id}', [PizzaRawMaterialController::class, 'show'])->name('pizza-raw-materials.show');
Route::put('/pizza-raw-materials/{id}', [PizzaRawMaterialController::class, 'update'])->name('pizza-raw-materials.update');
Route::delete('/pizza-raw-materials/{id}', [PizzaRawMaterialController::class, 'destroy'])->name('pizza-raw-materials.destroy');

// Rutas de pizzas
Route::get('/pizzas', [PizzasController::class, 'index'])->name('pizzas');
Route::post('/pizzas', [PizzasController::class, 'store'])->name('pizzas.store');
Route::get('/pizzas/{pizza}', [PizzasController::class, 'show'])->name('pizzas.show');
Route::put('/pizzas/{pizza}', [PizzasController::class, 'update'])->name('pizzas.update');
Route::delete('/pizzas/{pizza}', [PizzasController::class, 'destroy'])->name('pizzas.destroy');

// Rutas de users
Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

Route::post('/login', [UsersController::class, 'login'])->name('users.login');

// Rutas de purchases
Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases');
Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchases.store');
Route::get('/purchases/{id}', [PurchaseController::class, 'show'])->name('purchases.show');
Route::put('/purchases/{id}', [PurchaseController::class, 'update'])->name('purchases.update');
Route::delete('/purchases/{id}', [PurchaseController::class, 'destroy'])->name('purchases.destroy');

// Rutas de raw materials
Route::get('/raw-materials', [RawMaterialsController::class, 'index'])->name('raw-materials');
Route::post('/raw-materials', [RawMaterialsController::class, 'store'])->name('raw-materials.store');
Route::get('/raw-materials/{id}', [RawMaterialsController::class, 'show'])->name('raw-materials.show');
Route::put('/raw-materials/{id}', [RawMaterialsController::class, 'update'])->name('raw-materials.update');
Route::delete('/raw-materials/{id}', [RawMaterialsController::class, 'destroy'])->name('raw-materials.destroy');

// Rutas de suppliers
Route::get('/suppliers', [SuppliersController::class, 'index'])->name('suppliers');
Route::post('/suppliers', [SuppliersController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{id}', [SuppliersController::class, 'show'])->name('suppliers.show');
Route::put('/suppliers/{id}', [SuppliersController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{id}', [SuppliersController::class, 'destroy'])->name('suppliers.destroy');

// Rutas de pizza_sizes
Route::get('/pizza-sizes', [PizzaSizeController::class, 'index'])->name('pizza-sizes');
Route::post('/pizza-sizes', [PizzaSizeController::class, 'store'])->name('pizza-sizes.store');
Route::get('/pizza-sizes/{id}', [PizzaSizeController::class, 'show'])->name('pizza-sizes.show');
Route::put('/pizza-sizes/{id}', [PizzaSizeController::class, 'update'])->name('pizza-sizes.update');
Route::delete('/pizza-sizes/{id}', [PizzaSizeController::class, 'destroy'])->name('pizza-sizes.destroy');

// Rutas de ingredients
Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients');
Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');
Route::get('/ingredients/{id}', [IngredientController::class, 'show'])->name('ingredients.show');
Route::put('/ingredients/{id}', [IngredientController::class, 'update'])->name('ingredients.update');
Route::delete('/ingredients/{id}', [IngredientController::class, 'destroy'])->name('ingredients.destroy');

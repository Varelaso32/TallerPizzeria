<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\OrderPizzaController;
use App\Http\Controllers\PizzaRawMaterialController;
use App\Http\Controllers\OrderExtraIngredientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\EmployesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\raw_materialsController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\PizzaIngredientController;
use App\Http\Controllers\ExtraIngredientController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PizzasController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PizzaSizeController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Rutas para el perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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

    // Rutas para Suppliers
    Route::get('/suppliers', [SuppliersController::class, 'index'])->name('suppliers.index');
    Route::post('/suppliers', [SuppliersController::class, 'store'])->name('suppliers.store');
    Route::get('/suppliers/create', [SuppliersController::class, 'create'])->name('suppliers.create');
    Route::delete('/suppliers/{supplier}', [SuppliersController::class, 'destroy'])->name('suppliers.destroy');
    Route::put('/suppliers/{supplier}', [SuppliersController::class, 'update'])->name('suppliers.update');
    Route::get('/suppliers/{supplier}/edit', [SuppliersController::class, 'edit'])->name('suppliers.edit');

    // Rutas para Order_Pizza
    Route::get('/order_pizza', [OrderPizzaController::class, 'index'])->name('order_pizza.index');
    Route::post('/order_pizza', [OrderPizzaController::class, 'store'])->name('order_pizza.store');
    Route::get('/order_pizza/create', [OrderPizzaController::class, 'create'])->name('order_pizza.create');
    Route::delete('/order_pizza/{order_pizza}', [OrderPizzaController::class, 'destroy'])->name('order_pizza.destroy');
    Route::put('/order_pizza/{order_pizza}', [OrderPizzaController::class, 'update'])->name('order_pizza.update');
    Route::get('/order_pizza/{order_pizza}/edit', [OrderPizzaController::class, 'edit'])->name('order_pizza.edit');

    // Rutas para Raw_materials
    Route::get('/raw_materials', [raw_materialsController::class, 'index'])->name('raw_materials.index');
    Route::post('/raw_materials', [raw_materialsController::class, 'store'])->name('raw_materials.store');
    Route::get('/raw_materials/create', [raw_materialsController::class, 'create'])->name('raw_materials.create');
    Route::delete('/raw_materials/{raw_material}', [raw_materialsController::class, 'destroy'])->name('raw_materials.destroy');
    Route::put('/raw_materials/{raw_material}', [raw_materialsController::class, 'update'])->name('raw_materials.update');
    Route::get('/raw_materials/{raw_material}/edit', [raw_materialsController::class, 'edit'])->name('raw_materials.edit');

    // Rutas para Ingredientes por Pizza
    Route::get('/pizza_ingredient', [PizzaIngredientController::class, 'index'])->name('pizza_ingredient.index');
    Route::post('/pizza_ingredient', [PizzaIngredientController::class, 'store'])->name('pizza_ingredient.store');
    Route::get('/pizza_ingredient/create', [PizzaIngredientController::class, 'create'])->name('pizza_ingredient.create');
    Route::delete('/pizza_ingredient/{pizza_ingredient}', [PizzaIngredientController::class, 'destroy'])->name('pizza_ingredient.destroy');
    Route::put('/pizza_ingredient/{pizza_ingredient}', [PizzaIngredientController::class, 'update'])->name('pizza_ingredient.update');
    Route::get('/pizza_ingredient/{pizza_ingredient}/edit', [PizzaIngredientController::class, 'edit'])->name('pizza_ingredient.edit');

    // Rutas para Pizza raw materials
    Route::get('/pizza_raw_material', [PizzaRawMaterialController::class, 'index'])->name('pizza_raw_material.index');
    Route::post('/pizza_raw_material', [PizzaRawMaterialController::class, 'store'])->name('pizza_raw_material.store');
    Route::get('/pizza_raw_material/create', [PizzaRawMaterialController::class, 'create'])->name('pizza_raw_material.create');
    Route::delete('/pizza_raw_material/{pizza_raw_material}', [PizzaRawMaterialController::class, 'destroy'])->name('pizza_raw_material.destroy');
    Route::put('/pizza_raw_material/{pizza_raw_material}', [PizzaRawMaterialController::class, 'update'])->name('pizza_raw_material.update');
    Route::get('/pizza_raw_material/{pizza_raw_material}/edit', [PizzaRawMaterialController::class, 'edit'])->name('pizza_raw_material.edit');

    // Rutas para Compras
    Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases.index');
    Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchases.store');
    Route::get('/purchases/create', [PurchaseController::class, 'create'])->name('purchases.create');
    Route::delete('/purchases/{purchase}', [PurchaseController::class, 'destroy'])->name('purchases.destroy');
    Route::put('/purchases/{purchase}', [PurchaseController::class, 'update'])->name('purchases.update');
    Route::get('/purchases/{purchase}/edit', [PurchaseController::class, 'edit'])->name('purchases.edit');

    // Rutas para Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');

    // Rutas para Ingredientes Extra
    Route::get('/extra_ingredients', [ExtraIngredientController::class, 'index'])->name('extra_ingredients.index');
    Route::post('/extra_ingredients', [ExtraIngredientController::class, 'store'])->name('extra_ingredients.store');
    Route::get('/extra_ingredients/create', [ExtraIngredientController::class, 'create'])->name('extra_ingredients.create');
    Route::delete('/extra_ingredients/{extra_ingredient}', [ExtraIngredientController::class, 'destroy'])->name('extra_ingredients.destroy');
    Route::put('/extra_ingredients/{extra_ingredient}', [ExtraIngredientController::class, 'update'])->name('extra_ingredients.update');
    Route::get('/extra_ingredients/{extra_ingredient}/edit', [ExtraIngredientController::class, 'edit'])->name('extra_ingredients.edit');

    // Rutas para Pizzas
    Route::get('/pizzas', [PizzasController::class, 'index'])->name('pizzas.index');
    Route::get('/pizzas/create', [PizzasController::class, 'create'])->name('pizzas.create');
    Route::post('/pizzas', [PizzasController::class, 'store'])->name('pizzas.store');
    Route::get('/pizzas/{pizza}', [PizzasController::class, 'show'])->name('pizzas.show');
    Route::get('/pizzas/{pizza}/edit', [PizzasController::class, 'edit'])->name('pizzas.edit');
    Route::put('/pizzas/{pizza}', [PizzasController::class, 'update'])->name('pizzas.update');
    Route::delete('/pizzas/{pizza}', [PizzasController::class, 'destroy'])->name('pizzas.destroy');

    // Rutas para Tamaños de Pizza
    Route::get('/pizza_size', [PizzaSizeController::class, 'index'])->name('pizza_size.index');
    Route::get('/pizza_size/create', [PizzaSizeController::class, 'create'])->name('pizza_size.create');
    Route::post('/pizza_size', [PizzaSizeController::class, 'store'])->name('pizza_size.store');
    Route::get('/pizza_size/{pizzaSize}', [PizzaSizeController::class, 'show'])->name('pizza_size.show');
    Route::get('/pizza_size/{pizzaSize}/edit', [PizzaSizeController::class, 'edit'])->name('pizza_size.edit');
    Route::put('/pizza_size/{pizzaSize}', [PizzaSizeController::class, 'update'])->name('pizza_size.update');
    Route::delete('/pizza_size/{pizzaSize}', [PizzaSizeController::class, 'destroy'])->name('pizza_size.destroy');

    // Rutas para Ingredientes
    Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');
    Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
    Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');
    Route::get('/ingredients/{ingredient}', [IngredientController::class, 'show'])->name('ingredients.show'); // opcional
    Route::get('/ingredients/{ingredient}/edit', [IngredientController::class, 'edit'])->name('ingredients.edit');
    Route::put('/ingredients/{ingredient}', [IngredientController::class, 'update'])->name('ingredients.update');
    Route::delete('/ingredients/{ingredient}', [IngredientController::class, 'destroy'])->name('ingredients.destroy');

    // Rutas para Orders Extra Ingredient
    Route::get('/order_extra_ingredients', [OrderExtraIngredientController::class, 'index'])->name('order_extra_ingredients.index');
    Route::post('/order_extra_ingredients', [OrderExtraIngredientController::class, 'store'])->name('order_extra_ingredients.store');
    Route::get('/order_extra_ingredients/create', [OrderExtraIngredientController::class, 'create'])->name('order_extra_ingredients.create');
    Route::delete('/order_extra_ingredients/{order_extra_ingredient}', [OrderExtraIngredientController::class, 'destroy'])->name('order_extra_ingredients.destroy');
    Route::put('/order_extra_ingredients/{order_extra_ingredient}', [OrderExtraIngredientController::class, 'update'])->name('order_extra_ingredients.update');
    Route::get('/order_extra_ingredients/{order_extra_ingredient}/edit', [OrderExtraIngredientController::class, 'edit'])->name('order_extra_ingredients.edit');

    // Rutas para Orders Extra Ingredient
    Route::get('/branches', [BranchController::class, 'index'])->name('branches.index');
    Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');
    Route::get('/branches/create', [BranchController::class, 'create'])->name('branches.create');
    Route::delete('/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');
    Route::put('/branches/{branch}', [BranchController::class, 'update'])->name('branches.update');
    Route::get('/branches/{branch}/edit', [BranchController::class, 'edit'])->name('branches.edit');

    // Rutas para Orders Extra Ingredient
    Route::get('/order_extra_ingredients', [OrderExtraIngredientController::class, 'index'])->name('order_extra_ingredients.index');
    Route::post('/order_extra_ingredients', [OrderExtraIngredientController::class, 'store'])->name('order_extra_ingredients.store');
    Route::get('/order_extra_ingredients/create', [OrderExtraIngredientController::class, 'create'])->name('order_extra_ingredients.create');
    Route::delete('/order_extra_ingredients/{order_extra_ingredient}', [OrderExtraIngredientController::class, 'destroy'])->name('order_extra_ingredients.destroy');
    Route::put('/order_extra_ingredients/{order_extra_ingredient}', [OrderExtraIngredientController::class, 'update'])->name('order_extra_ingredients.update');
    Route::get('/order_extra_ingredients/{order_extra_ingredient}/edit', [OrderExtraIngredientController::class, 'edit'])->name('order_extra_ingredients.edit');

    // Rutas para Orders Extra Ingredient
    Route::get('/branches', [BranchController::class, 'index'])->name('branches.index');
    Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');
    Route::get('/branches/create', [BranchController::class, 'create'])->name('branches.create');
    Route::delete('/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');
    Route::put('/branches/{branch}', [BranchController::class, 'update'])->name('branches.update');
    Route::get('/branches/{branch}/edit', [BranchController::class, 'edit'])->name('branches.edit');

    // Aquí agregan el resto de rutas para que estén protegidas por autenticación

});


require __DIR__ . '/auth.php';

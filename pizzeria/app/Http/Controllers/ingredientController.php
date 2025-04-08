<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Pizza;
use App\Models\IngredientType; // o como se llame tu modelo de ingredientes reales
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::with(['pizza', 'ingredientDetail'])->get();
        return view('ingredient.index', compact('ingredients'));
    }

    public function create()
    {
        $pizzas = Pizza::all();
        return view('ingredient.create', compact('pizzas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredient_types,id',
            'quantity' => 'required|numeric|min:0.01'
        ]);

        Ingredient::create($request->all());

        return redirect()->route('ingredient.index')
               ->with('success', 'Ingrediente agregado a la pizza correctamente');
    }

    public function show(Ingredient $ingredient)
    {
        return view('ingredient.show', compact('ingredient'));
    }

    public function edit(Ingredient $ingredient)
    {
        $pizzas = Pizza::all();
        $ingredientTypes = IngredientType::all();
        return view('ingredient.edit', compact('ingredient', 'pizzas', 'ingredientTypes'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredient_types,id',
            'quantity' => 'required|numeric|min:0.01'
        ]);

        $ingredient->update($request->all());

        return redirect()->route('ingredient.index')
               ->with('success', 'Ingrediente actualizado correctamente');
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('ingredient.index')
               ->with('success', 'Ingrediente eliminado correctamente');
    }
}

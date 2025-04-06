<?php

namespace App\Http\Controllers;

use App\Models\Ingredient; 
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredient.index', compact('ingredients'));
    }

    public function create()
    {
        return view('ingredient.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ingredient,name'
        ]);

        Ingredient::create($request->all());

        return redirect()->route('ingredient.index')
               ->with('success', 'Ingrediente creado correctamente');
    }

    public function show(Ingredient $ingredient)
    {
        return view('ingredient.show', compact('ingredient'));
    }

    public function edit(Ingredient $ingredient)
    {
        return view('ingredient.edit', compact('ingredient'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ingredient,name,'.$ingredient->id
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
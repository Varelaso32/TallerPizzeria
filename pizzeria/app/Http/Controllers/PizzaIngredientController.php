<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pizza_ingredient;

class PizzaIngredientController extends Controller
{
    public function index()
    {
        $pizzaIngredients = DB::table('pizza_ingredient')
            ->join('pizzas', 'pizza_ingredient.pizza_id', '=', 'pizzas.id')
            ->join('ingredients', 'pizza_ingredient.ingredient_id', '=', 'ingredients.id')
            ->select(
                'pizza_ingredient.*',
                'pizzas.name as pizza_name',
                'ingredients.name as ingredient_name'
            )
            ->get();
    
        return view('pizza_ingredient.index', ['pizzaIngredients' => $pizzaIngredients]);
    }

    public function create()
    {
        $pizzas = DB::table('pizzas')
            ->orderBy('name')
            ->get();
    
        $ingredients = DB::table('ingredients')
            ->orderBy('name')
            ->get();
    
        return view('pizza_ingredient.new', compact('pizzas', 'ingredients'));
    }

    public function store(Request $request)
    {
        DB::table('pizza_ingredient')->insert([
            'pizza_id' => $request->pizza_id,
            'ingredient_id' => $request->ingredient_id,
        ]);

        $pizzaIngredients = DB::table('pizza_ingredient')
            ->join('pizzas', 'pizza_ingredient.pizza_id', '=', 'pizzas.id')
            ->join('ingredients', 'pizza_ingredient.ingredient_id', '=', 'ingredients.id')
            ->select(
                'pizza_ingredient.*',
                'pizzas.name as pizza_name',
                'ingredients.name as ingredient_name'
            )
            ->get();

        return view('pizza_ingredient.index', ['pizzaIngredients' => $pizzaIngredients]);
    }

    public function edit(string $id)
    {
        $pizzaIngredient = pizza_ingredient::find($id);

        $pizzas = DB::table('pizzas')
            ->orderBy('name')
            ->get();

        $ingredients = DB::table('ingredients')
            ->orderBy('name')
            ->get();

        return view('pizza_ingredient.edit', [
            'pizzaIngredient' => $pizzaIngredient,
            'pizzas' => $pizzas,
            'ingredients' => $ingredients
        ]);
    }

    public function update(Request $request, string $id)
    {
        $pizzaIngredient = pizza_ingredient::find($id);

        $pizzaIngredient->pizza_id = $request->pizza_id;
        $pizzaIngredient->ingredient_id = $request->ingredient_id;
        $pizzaIngredient->save();

        $pizzaIngredients = DB::table('pizza_ingredient')
            ->join('pizzas', 'pizza_ingredient.pizza_id', '=', 'pizzas.id')
            ->join('ingredients', 'pizza_ingredient.ingredient_id', '=', 'ingredients.id')
            ->select(
                'pizza_ingredient.*',
                'pizzas.name as pizza_name',
                'ingredients.name as ingredient_name'
            )
            ->get();

        return view('pizza_ingredient.index', ['pizzaIngredients' => $pizzaIngredients]);
    }

    public function destroy(string $id)
    {
        $pizzaIngredients = pizza_ingredient::find($id);
        $pizzaIngredients->delete();
    
        $pizzaIngredients = DB::table('pizza_ingredient')
            ->join('pizzas', 'pizza_ingredient.pizza_id', '=', 'pizzas.id')
            ->join('ingredients', 'pizza_ingredient.ingredient_id', '=', 'ingredients.id')
            ->select(
                'pizza_ingredient.id',
                'pizzas.name as pizza_name',
                'ingredients.name as ingredient_name',
                'pizza_ingredient.created_at',
                'pizza_ingredient.updated_at'
            )
            ->get();
    
        return view('pizza_ingredient.index', ['pizzaIngredients' => $pizzaIngredients]);
    }
    
    

}

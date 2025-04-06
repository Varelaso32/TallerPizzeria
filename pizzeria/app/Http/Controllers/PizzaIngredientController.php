<?php

namespace App\Http\Controllers;

use App\Models\pizza_ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pizza_igredient;

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
    

}

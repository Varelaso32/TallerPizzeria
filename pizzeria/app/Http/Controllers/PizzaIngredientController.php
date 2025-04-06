<?php

namespace App\Http\Controllers;

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
}

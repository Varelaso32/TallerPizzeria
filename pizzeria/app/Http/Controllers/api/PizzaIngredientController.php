<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pizza_ingredient;

class PizzaIngredientController extends Controller
{
    private $validate = Validator::make($request->all(), [
        'pizza_id' => 'required|exists:pizzas,id',
        'ingredient_id' => 'required|exists:ingredients,id'
    ]);
    /**
     * Display a listing of the resource.
     */
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

        return json_encode($pizzaIngredients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información.',
                'statusCode' => 400
            ]);
        }

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

        return json_encode($pizzaIngredients);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pizzaIngredient = pizza_ingredient::find($id);

        if (is_null($pizzaIngredient)) {
            return abort(404);
        }

        return json_encode($pizzaIngredient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($this->validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información.',
                'statusCode' => 400
            ]);
        }

        $pizzaIngredient = pizza_ingredient::find($id);

        if (is_null($pizzaIngredient)) {
            return abort(404);
        }

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

        return json_encode($pizzaIngredients);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizzaIngredient = pizza_ingredient::find($id);

        if (is_null($pizzaIngredient)) {
            return abort(404);
        }

        $pizzaIngredient->delete();

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

        return json_encode($pizzaIngredients);
    }
}

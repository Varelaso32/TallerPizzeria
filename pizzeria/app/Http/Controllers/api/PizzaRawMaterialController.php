<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PizzaRawMaterial;

class PizzaRawMaterialController extends Controller
{
    /**
     * Obtener todos los ingredientes de pizza con información asociada.
     */
    private function getPizzaIngredients()
    {
        $ingredients = DB::table('pizza_raw_material')
            ->join('pizzas', 'pizza_raw_material.pizza_id', '=', 'pizzas.id')
            ->join('raw_materials', 'pizza_raw_material.raw_material_id', '=', 'raw_materials.id')
            ->select([
                'pizza_raw_material.*',
                'pizzas.name as pizza_name',
                'raw_materials.name as raw_material_name'
            ])
            ->get();

        return $ingredients;
    }

    /**
     * Mostrar todos los registros de pizza_raw_material.
     */
    public function index()
    {
        $ingredients = $this->getPizzaIngredients();
        return json_encode($ingredients);
    }

    /**
     * Crear un nuevo ingrediente para una pizza.
     */
    public function store(Request $request)
    {
        $ingredient = new PizzaRawMaterial();
        $ingredient->pizza_id = $request->input('pizza_id');
        $ingredient->raw_material_id = $request->input('raw_material_id');
        $ingredient->quantity = $request->input('quantity');
        $ingredient->save();

        $ingredients = $this->getPizzaIngredients();
        return json_encode($ingredients);
    }

    /**
     * Mostrar un registro específico de pizza_raw_material.
     */
    public function show(string $id)
    {
        $ingredient = PizzaRawMaterial::find($id);
        return json_encode($ingredient);
    }

    /**
     * Actualizar un registro de pizza_raw_material.
     */
    public function update(Request $request, string $id)
    {
        $ingredient = PizzaRawMaterial::find($id);
        $ingredient->pizza_id = $request->input('pizza_id');
        $ingredient->raw_material_id = $request->input('raw_material_id');
        $ingredient->quantity = $request->input('quantity');
        $ingredient->save();

        $ingredients = $this->getPizzaIngredients();
        return json_encode($ingredients);
    }

    /**
     * Eliminar un registro de pizza_raw_material.
     */
    public function destroy(string $id)
    {
        $ingredient = PizzaRawMaterial::find($id);
        $ingredient->delete();

        $ingredients = $this->getPizzaIngredients();
        return json_encode($ingredients);
    }
}

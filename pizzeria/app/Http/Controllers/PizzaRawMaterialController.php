<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PizzaRawMaterial;

class PizzaRawMaterialController extends Controller
{
    
    public function index()
    {
        $pizzaIngredients = DB::table('pizza_raw_material')
        ->join('pizzas', 'pizza_raw_material.pizza_id', '=', 'pizzas.id')
        ->join('raw_materials', 'pizza_raw_material.raw_material_id', '=', 'raw_materials.id')
        ->select(
            'pizza_raw_material.*',
            'pizzas.name as pizza_name',
            'raw_materials.name as raw_material_name'
        )
        ->get();

        return view('pizza_raw_material.index', ['pizzaIngredients' => $pizzaIngredients]);
    }

    
    public function create()
    {
        $pizzas = DB::table('pizzas')
        ->orderBy('name')
        ->get();

        $rawMaterials = DB::table('raw_materials')
            ->orderBy('name')
            ->get();

        return view('pizza_raw_material.new', [
            'pizzas' => $pizzas,
            'rawMaterials' => $rawMaterials
        ]);
    }


    public function store(Request $request)
    {
        $ingredient = new PizzaRawMaterial();
        $ingredient->pizza_id = $request->pizza_id;
        $ingredient->raw_material_id = $request->raw_material_id;
        $ingredient->quantity = $request->quantity;
        $ingredient->save();

        $pizzaIngredients = DB::table('pizza_raw_material')
            ->join('pizzas', 'pizza_raw_material.pizza_id', '=', 'pizzas.id')
            ->join('raw_materials', 'pizza_raw_material.raw_material_id', '=', 'raw_materials.id')
            ->select(
                'pizza_raw_material.*',
                'pizzas.name as pizza_name',
                'raw_materials.name as raw_material_name'
            )
            ->get();

        return view('pizza_raw_material.index', ['pizzaIngredients' => $pizzaIngredients]);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $ingredient = PizzaRawMaterial::find($id);

        $pizzas = DB::table('pizzas')
            ->orderBy('name')
            ->get();

        $rawMaterials = DB::table('raw_materials')
            ->orderBy('name')
            ->get();

        return view('pizza_raw_material.edit', [
            'ingredient' => $ingredient,
            'pizzas' => $pizzas,
            'rawMaterials' => $rawMaterials
        ]);
    }


    public function update(Request $request, string $id)
    {
        $ingredient = PizzaRawMaterial::find($id);

        $ingredient->pizza_id = $request->pizza_id;
        $ingredient->raw_material_id = $request->raw_material_id;
        $ingredient->quantity = $request->quantity;
        $ingredient->save();

        $pizzaIngredients = DB::table('pizza_raw_material')
            ->join('pizzas', 'pizza_raw_material.pizza_id', '=', 'pizzas.id')
            ->join('raw_materials', 'pizza_raw_material.raw_material_id', '=', 'raw_materials.id')
            ->select(
                'pizza_raw_material.*',
                'pizzas.name as pizza_name',
                'raw_materials.name as raw_material_name'
            )
            ->get();

        return view('pizza_raw_material.index', ['pizzaIngredients' => $pizzaIngredients]);
    }


    public function destroy(string $id)
    {
        $pizzaIngredients = PizzaRawMaterial::find($id);
        $pizzaIngredients->delete();

        $pizzaIngredients = DB::table('pizza_raw_material')
        ->join('pizzas', 'pizza_raw_material.pizza_id', '=', 'pizzas.id')
        ->join('raw_materials', 'pizza_raw_material.raw_material_id', '=', 'raw_materials.id')
        ->select(
            'pizza_raw_material.*',
            'pizzas.name as pizza_name',
            'raw_materials.name as raw_material_name'
        )
        ->get();

        return view('pizza_raw_material.index', ['pizzaIngredients' => $pizzaIngredients]);
    }
}

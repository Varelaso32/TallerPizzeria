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
        // Crear nueva relación pizza <-> materia prima
        $ingredient = new PizzaRawMaterial();
        $ingredient->pizza_id = $request->pizza_id;
        $ingredient->raw_material_id = $request->raw_material_id;
        $ingredient->quantity = $request->quantity;
        $ingredient->save();

        // Consultar nuevamente la lista de relaciones para mostrar en index
        $pizzaIngredients = DB::table('pizza_raw_material')
            ->join('pizzas', 'pizza_raw_material.pizza_id', '=', 'pizzas.id')
            ->join('raw_materials', 'pizza_raw_material.raw_material_id', '=', 'raw_materials.id')
            ->select(
                'pizza_raw_material.*',
                'pizzas.name as pizza_name',
                'raw_materials.name as raw_material_name'
            )
            ->get();

        // Retornar a la vista index con los datos actualizados
        return view('pizza_raw_material.index', ['pizzaIngredients' => $pizzaIngredients]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
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

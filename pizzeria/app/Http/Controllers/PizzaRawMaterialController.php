<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PizzaRawMaterial;

class PizzaRawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}

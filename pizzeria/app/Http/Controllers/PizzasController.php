<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\PizzaSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PizzasController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = DB::table('pizzas')
            ->join('pizza_size', 'pizzas.id', '=', 'pizza_size.pizza_id')
            ->select('pizzas.*', 'pizza_size.size as size_name', 'pizza_size.price as size_price')
            ->get();
        
        return view('pizzas.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     * 
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        return view('pizzas.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sizes' => 'required|array',
            'sizes.*.size' => 'required|in:pequeña,mediana,grande',
            'sizes.*.price' => 'required|numeric|min:0'
        ]);

        $pizza = Pizza::create($request->only('name'));
        
        foreach ($request->sizes as $size) {
            $pizza->sizes()->create($size);
        }

        return redirect()->route('pizzas.index')->with('success', 'Pizza creada correctamente');
    }

    /**
     * Display the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        return view('pizzas.show', compact('pizza'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        return view('pizzas.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sizes' => 'required|array',
            'sizes.*.id' => 'sometimes|exists:pizza_size,id',
            'sizes.*.size' => 'required|in:pequeña,mediana,grande',
            'sizes.*.price' => 'required|numeric|min:0'
        ]);

        $pizza->update($request->only('name'));

        foreach ($request->sizes as $sizeData) {
            if (isset($sizeData['id'])) {
                $pizza->sizes()->find($sizeData['id'])->update($sizeData);
            } else {
                $pizza->sizes()->create($sizeData);
            }
        }

        return redirect()->route('pizzas.index')->with('success', 'Pizza actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $pizza->sizes()->delete();
        $pizza->delete();
        return redirect()->route('pizzas.index')->with('success', 'Pizza eliminada correctamente');
    }
}

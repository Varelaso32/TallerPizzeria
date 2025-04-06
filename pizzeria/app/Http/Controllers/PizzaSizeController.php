<?php
namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\PizzaSize;
use Illuminate\Http\Request;

class PizzaSizeController extends Controller
{
    public function index()
    {
        $sizes = PizzaSize::with('pizza')->get();
        return view('pizza-size.index', compact('sizes'));
    }

    public function create()
    {
        $pizzas = Pizza::all();
        return view('pizza-size.create', compact('pizzas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0'
        ]);

        PizzaSize::create($request->all());

        return redirect()->route('pizza-size.index')->with('success', 'Tamaño de pizza creado correctamente');
    }

    public function show(PizzaSize $pizzaSize)
    {
        return view('pizza_size.show', compact('pizzaSize'));
    }

    public function edit(PizzaSize $pizzaSize)
    {
        $pizzas = Pizza::all();
        return view('pizza_size.edit', compact('pizzaSize', 'pizzas'));
    }

    public function update(Request $request, PizzaSize $pizzaSize)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0'
        ]);

        $pizzaSize->update($request->all());

        return redirect()->route('pizza-size.index')->with('success', 'Tamaño de pizza actualizado correctamente');
    }

    public function destroy(PizzaSize $pizzaSize)
    {
        $pizzaSize->delete();
        return redirect()->route('pizza-size.index')->with('success', 'Tamaño de pizza eliminado correctamente');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\PizzaSize;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PizzaSizeController extends Controller
{
    public function index()
    {
        // Obtener todos los tamaños de pizza con los detalles de la pizza
        $pizzaSizes = DB::table('pizza_size as ps')
            ->join('pizzas as p', 'ps.pizza_id', '=', 'p.id')
            ->select(
                'ps.id',
                'p.name as pizza_name',
                'ps.size',
                'ps.price',
                'ps.created_at',
                'ps.updated_at'
            )
            ->orderBy('p.name')
            ->orderBy('ps.size')
            ->get();

        return view('pizza_size.index', ['pizzaSizes' => $pizzaSizes]);
    }

    public function create()
    {
        // Obtener las pizzas para asignar a un tamaño
        $pizzas = Pizza::orderBy('name')->get();

        return view('pizza_size.new', ['pizzas' => $pizzas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0.01|max:9999.99',
        ]);

        // Crear el nuevo tamaño de pizza
        $pizzaSize = new PizzaSize();
        $pizzaSize->pizza_id = $request->pizza_id;
        $pizzaSize->size = $request->size;
        $pizzaSize->price = $request->price;
        $pizzaSize->save();

        // Redirigir a la vista de listado de tamaños de pizza
        return $this->index();
    }

    public function edit(string $id)
    {
        $pizzaSize = PizzaSize::find($id);
        $pizzas = Pizza::orderBy('name')->get();

        return view('pizza_size.edit', ['pizzaSize' => $pizzaSize, 'pizzas' => $pizzas]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0.01|max:9999.99',
        ]);

        // Actualizar el tamaño de pizza
        $pizzaSize = PizzaSize::find($id);
        $pizzaSize->pizza_id = $request->pizza_id;
        $pizzaSize->size = $request->size;
        $pizzaSize->price = $request->price;
        $pizzaSize->save();

        // Redirigir a la vista de listado de tamaños de pizza
        return $this->index();
    }

    public function destroy(string $id)
    {
        // Eliminar el tamaño de pizza
        $pizzaSize = PizzaSize::find($id);
        $pizzaSize->delete();

        // Redirigir a la vista de listado de tamaños de pizza
        return $this->index();
    }
}
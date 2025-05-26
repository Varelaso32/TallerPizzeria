<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\PizzaSize;

class PizzaSizeController extends Controller
{
    /**
     * Obtener todos los tamaños de pizza con información de la pizza
     */
    private function getPizzaSizes()
    {
        return DB::table('pizza_size as ps')
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
    }

    /**
     * Mostrar todos los tamaños de pizza
     */
    public function index()
    {
        $pizzaSizes = $this->getPizzaSizes();
        return response()->json($pizzaSizes);
    }

    /**
     * Crear un nuevo tamaño de pizza
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'pizza_id' => ['required', 'exists:pizzas,id'],
            'size' => ['required', 'in:pequeña,mediana,grande'],
            'price' => ['required', 'numeric', 'min:0.01', 'max:9999.99'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $pizzaSize = new PizzaSize();
        $pizzaSize->pizza_id = $request->input('pizza_id');
        $pizzaSize->size = $request->input('size');
        $pizzaSize->price = $request->input('price');
        $pizzaSize->save();

        $pizzaSizes = $this->getPizzaSizes();
        return response()->json($pizzaSizes);
    }

    /**
     * Mostrar un tamaño específico de pizza
     */
    public function show(string $id)
    {
        $pizzaSize = PizzaSize::find($id);

        if (!$pizzaSize) {
            return response()->json(['error' => 'Tamaño de pizza no encontrado.'], 404);
        }

        return response()->json($pizzaSize);
    }

    /**
     * Actualizar un tamaño de pizza
     */
    public function update(Request $request, string $id)
    {
        $pizzaSize = PizzaSize::find($id);

        if (!$pizzaSize) {
            return response()->json(['error' => 'Tamaño de pizza no encontrado.'], 404);
        }

        $validate = Validator::make($request->all(), [
            'pizza_id' => ['required', 'exists:pizzas,id'],
            'size' => ['required', 'in:pequeña,mediana,grande'],
            'price' => ['required', 'numeric', 'min:0.01', 'max:9999.99'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $pizzaSize->pizza_id = $request->input('pizza_id');
        $pizzaSize->size = $request->input('size');
        $pizzaSize->price = $request->input('price');
        $pizzaSize->save();

        $pizzaSizes = $this->getPizzaSizes();
        return response()->json($pizzaSizes);
    }

    /**
     * Eliminar un tamaño de pizza
     */
    public function destroy(string $id)
    {
        $pizzaSize = PizzaSize::find($id);
        $pizzaSize->delete();

        $pizzaSizes = $this->getPizzaSizes();
        return response()->json($pizzaSizes);
    }
}

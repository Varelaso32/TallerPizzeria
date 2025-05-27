<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    /**
     * Obtener todos los ingredientes
     */
    private function getIngredients()
    {
        return DB::table('ingredients')
            ->select('id', 'name', 'created_at', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Mostrar todos los ingredientes
     */
    public function index()
    {
        $ingredients = $this->getIngredients();
        return json_encode($ingredients);
    }

    /**
     * Crear un nuevo ingrediente
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:ingredients,name']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $ingredient = new Ingredient();
        $ingredient->name = $request->name;
        $ingredient->save();

        return json_encode($this->getIngredients());
    }

    /**
     * Mostrar un ingrediente específico
     */
    public function show(string $id)
    {
        $ingredient = Ingredient::find($id);
        return json_encode($ingredient);
    }

    /**
     * Actualizar un ingrediente
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:ingredients,name,' . $id]
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $ingredient = Ingredient::find($id);
        $ingredient->name = $request->name;
        $ingredient->save();

        return json_encode($this->getIngredients());
    }

    /**
     * Eliminar un ingrediente
     */
    public function destroy(string $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->delete();

        return json_encode($this->getIngredients());
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\raw_materials;

class RawMaterialsController extends Controller
{
    /**
     * Método privado reutilizable para obtener las materias primas
     */
    private function getRawMaterials()
    {
        return DB::table('raw_materials')
            ->select('id', 'name', 'unit', 'current_stock', 'created_at', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Muestra una lista de todas las materias primas
     */
    public function index()
    {
        $rawMaterials = $this->getRawMaterials();
        return response()->json($rawMaterials);
    }

    /**
     * Almacena una nueva materia prima
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100', 'unique:raw_materials,name'],
            'unit' => ['required', 'string', 'max:50'],
            'current_stock' => ['required', 'numeric', 'min:0']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $rawMaterial = new raw_materials();

        $rawMaterial->name = $request->input('name');
        $rawMaterial->unit = $request->input('unit');
        $rawMaterial->current_stock = $request->input('current_stock');
        $rawMaterial->save();

        $rawMaterials = $this->getRawMaterials();
        return response()->json($rawMaterials);
    }

    /**
     * Muestra una materia prima específica
     */
    public function show(string $id)
    {
        $rawMaterial = raw_materials::find($id);
        return response()->json($rawMaterial);
    }

    /**
     * Actualiza una materia prima existente
     */
    public function update(Request $request, string $id)
    {
        $rawMaterial = raw_materials::find($id);

        if (!$rawMaterial) {
            return response()->json([
                'msg' => 'Materia prima no encontrada.',
                'statusCode' => 404
            ], 404);
        }

        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100', 'unique:raw_materials,name,' . $id],
            'unit' => ['required', 'string', 'max:50'],
            'current_stock' => ['required', 'numeric', 'min:0']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $rawMaterial = raw_materials::find($id);

        $rawMaterial->name = $request->input('name');
        $rawMaterial->unit = $request->input('unit');
        $rawMaterial->current_stock = $request->input('current_stock');
        $rawMaterial->save();

        $rawMaterials = $this->getRawMaterials();
        return response()->json($rawMaterials);
    }

    /**
     * Elimina una materia prima
     */
    public function destroy(string $id)
    {
        $rawMaterial = raw_materials::find($id);
        $rawMaterial->delete();

        $rawMaterials = $this->getRawMaterials();
        return response()->json($rawMaterials);
    }
}

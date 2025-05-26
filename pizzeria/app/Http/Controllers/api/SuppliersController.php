<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Suppliers;

class SuppliersController extends Controller
{
    /**
     * Método privado reutilizable para obtener los proveedores
     */
    private function getSuppliers()
    {
        return DB::table('suppliers')
            ->select('id', 'name', 'contact_info', 'created_at', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Muestra una lista de todos los proveedores
     */
    public function index()
    {
        $suppliers = $this->getSuppliers();
        return response()->json($suppliers);
    }

    /**
     * Almacena un nuevo proveedor
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:suppliers,name'],
            'contact_info' => ['required', 'string', 'max:255']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $supplier = new Suppliers();

        $supplier->name = $request->input('name');
        $supplier->contact_info = $request->input('contact_info');
        $supplier->save();

        $suppliers = $this->getSuppliers();
        return response()->json($suppliers);
    }

    /**
     * Muestra un proveedor específico
     */
    public function show(string $id)
    {
        $supplier = Suppliers::find($id);
        return response()->json($supplier);
    }

    /**
     * Actualiza un proveedor existente
     */
    public function update(Request $request, string $id)
    {
        $supplier = Suppliers::find($id);

        if (!$supplier) {
            return response()->json([
                'msg' => 'Proveedor no encontrado.',
                'statusCode' => 404
            ], 404);
        }

        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:suppliers,name,' . $id],
            'contact_info' => ['required', 'string', 'max:255']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $supplier->name = $request->input('name');
        $supplier->contact_info = $request->input('contact_info');
        $supplier->save();

        $suppliers = $this->getSuppliers();
        return response()->json($suppliers);
    }

    /**
     * Elimina un proveedor
     */
    public function destroy(string $id)
    {
        $supplier = Suppliers::find($id);
        $supplier->delete();

        $suppliers = $this->getSuppliers();
        return response()->json($suppliers);
    }
}

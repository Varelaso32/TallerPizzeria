<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

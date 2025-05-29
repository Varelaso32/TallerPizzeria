<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Purchases;

class PurchaseController extends Controller
{
    /**
     * Obtener todas las compras con datos relacionados
     */
    private function getPurchases()
    {
        return DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('raw_materials', 'purchases.raw_material_id', '=', 'raw_materials.id')
            ->select(
                'purchases.*',
                'suppliers.name as supplier_name',
                'raw_materials.name as raw_material_name'
            )
            ->orderBy('purchases.purchase_date', 'desc')
            ->get();
    }

    /**
     * Mostrar todas las compras
     */
    public function index()
    {
        $purchases = $this->getPurchases();
        return response()->json($purchases);
    }

    /**
     * Crear una nueva compra
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'supplier_id' => ['required', 'exists:suppliers,id'],
            'raw_material_id' => ['required', 'exists:raw_materials,id'],
            'quantity' => ['required', 'numeric', 'min:0.01'],
            'purchase_price' => ['required', 'numeric', 'min:0'],
            'purchase_date' => ['required', 'date']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $purchase = new Purchases();

        $purchase->supplier_id = $request->input('supplier_id');
        $purchase->raw_material_id = $request->input('raw_material_id');
        $purchase->quantity = $request->input('quantity');
        $purchase->purchase_price = $request->input('purchase_price');
        $purchase->purchase_date = $request->input('purchase_date');
        $purchase->save();

        return response()->json($this->getPurchases());
    }

    /**
     * Mostrar una compra específica
     */
    public function show(string $id)
    {
        $purchase = Purchases::find($id);

        if (!$purchase) {
            return response()->json(['error' => 'Compra no encontrada'], 404);
        }

        return response()->json($purchase);
    }

    /**
     * Actualizar una compra existente
     */
    public function update(Request $request, string $id)
    {
        $purchase = Purchases::find($id);

        if (!$purchase) {
            return response()->json(['error' => 'Compra no encontrada'], 404);
        }

        $validate = Validator::make($request->all(), [
            'supplier_id' => ['required', 'exists:suppliers,id'],
            'raw_material_id' => ['required', 'exists:raw_materials,id'],
            'quantity' => ['required', 'numeric', 'min:0.01'],
            'purchase_price' => ['required', 'numeric', 'min:0'],
            'purchase_date' => ['required', 'date']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $purchase->supplier_id = $request->input('supplier_id');
        $purchase->raw_material_id = $request->input('raw_material_id');
        $purchase->quantity = $request->input('quantity');
        $purchase->purchase_price = $request->input('purchase_price');
        $purchase->purchase_date = $request->input('purchase_date');
        $purchase->save();

        return response()->json($this->getPurchases());
    }

    /**
     * Eliminar una compra
     */
    public function destroy(string $id)
    {
        $purchase = Purchases::find($id);
        $purchase->delete();

        $purchases = $this->getPurchases();
        return response()->json($purchases);
    }
}

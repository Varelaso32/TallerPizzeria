<?php

namespace App\Http\Controllers;

use App\Models\Purchases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('raw_materials', 'purchases.raw_material_id', '=', 'raw_materials.id')
            ->select(
                'purchases.*',
                'suppliers.name as supplier_name',
                'raw_materials.name as raw_material_name'
            )
            ->get();

        return view('purchases.index', ['purchases' => $purchases]);
    }
    public function create()
    {
        $suppliers = DB::table('suppliers')->get();
        $raw_materials = DB::table('raw_materials')->get();

        return view('purchases.new', [
            'suppliers' => $suppliers,
            'raw_materials' => $raw_materials
        ]);
    }

    public function store(Request $request)
    {
        $purchases = new Purchases();

        $purchases->supplier_id = $request->supplier_id;
        $purchases->raw_material_id = $request->raw_material_id;
        $purchases->quantity = $request->quantity;
        $purchases->purchase_price = $request->purchase_price;
        $purchases->purchase_date = $request->purchase_date;
        $purchases->save();

        $purchases = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('raw_materials', 'purchases.raw_material_id', '=', 'raw_materials.id')
            ->select(
                'purchases.*',
                'suppliers.name as supplier_name',
                'raw_materials.name as raw_material_name'
            )
            ->get();

        return view('purchases.index', ['purchases' => $purchases]);
    }
    public function edit(string $id)
    {
        $purchase = Purchases::find($id);

        $suppliers = DB::table('suppliers')
            ->orderBy('name')
            ->get();

        $rawMaterials = DB::table('raw_materials')
            ->orderBy('name')
            ->get();

        return view('purchases.edit', [
            'purchase' => $purchase,
            'suppliers' => $suppliers,
            'rawMaterials' => $rawMaterials
        ]);
    }
    public function update(Request $request, string $id)
    {
        $purchase = Purchases::find($id);

        $purchase->supplier_id = $request->supplier_id;
        $purchase->raw_material_id = $request->raw_material_id;
        $purchase->quantity = $request->quantity;
        $purchase->purchase_price = $request->purchase_price;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->save();

        $purchases = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('raw_materials', 'purchases.raw_material_id', '=', 'raw_materials.id')
            ->select(
                'purchases.*',
                'suppliers.name as supplier_name',
                'raw_materials.name as raw_material_name'
            )
            ->get();

        return view('purchases.index', ['purchases' => $purchases]);
    }
    public function destroy(string $id)
    {
        $purchase = Purchases::find($id);
        $purchase->delete();

        $purchases = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('raw_materials', 'purchases.raw_material_id', '=', 'raw_materials.id')
            ->select(
                'purchases.*',
                'suppliers.name as supplier_name',
                'raw_materials.name as raw_material_name'
            )
            ->get();

        return view('purchases.index', ['purchases' => $purchases]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\raw_materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class raw_materialsController extends Controller
{
    public function index()
    {
        $raw_materials = DB::table('raw_materials')
        ->select('id', 'name', 'unit', 'current_stock','created_at', 'updated_at')
        ->get();

        return view('raw_materials.index',['raw_materials' => $raw_materials]); 
    }
    public function create()
    {
    return view('raw_materials.new'); 
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'unit' => 'required|string|max:50',
        'current_stock' => 'required|numeric|min:0',
    ]);

    $raw_material = new raw_materials(); 
    $raw_material->name = $validatedData['name'];
    $raw_material->unit = $validatedData['unit'];
    $raw_material->current_stock = $validatedData['current_stock'];
    $raw_material->save();

    return redirect()->route('raw_materials.index')->with('success', 'Materia prima registrada exitosamente.');
    }
    
    public function edit($id)
    {
        $raw_materials = raw_materials::find($id);

        return view('raw_materials.edit', ['raw_material' => $raw_materials]);
    }
    public function update(Request $request, $id)
    {
        $raw_materials = raw_materials::find($id);

        $raw_materials->name = $request->name;
        $raw_materials->unit = $request->unit;
        $raw_materials->current_stock = $request->current_stock;
        $raw_materials->save();

        $raw_materials = DB::table('raw_materials')
        ->select('id', 'name', 'unit','current_stock', 'created_at', 'updated_at')
        ->get();

        return view('raw_materials.index',['raw_materials' => $raw_materials]); 
    }
    public function destroy($id)
    {
        raw_materials::destroy($id);
        return redirect()->route('raw_materials.index')->with('success', 'Raw material deleted successfully.');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suppliers;
use Illuminate\Support\Facades\DB;

class SuppliersController extends Controller
{
    public function index()
    {
        $supplier = DB::table('suppliers')
        ->select('id', 'name', 'contact_info', 'created_at', 'updated_at')
        ->get();

        return view('suppliers.index',['suppliers' => $supplier]); 
    }

    public function create()
    {
        return view('suppliers.new'); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'nullable|string|max:255',
        ]);

        $supplier = new suppliers();
        $supplier->name = $validatedData['name'];
        $supplier->contact_info = $validatedData['contact_info'];
        $supplier->save();

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $supplier = suppliers::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'nullable|string|max:255',
        ]);

        $supplier = suppliers::findOrFail($id);
        $supplier->update($validatedData);

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    public function destroy($id)
    {
        suppliers::destroy($id);
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}

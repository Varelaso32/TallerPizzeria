<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suppliers;

class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = suppliers::paginate(10); // Paginar los resultados
        return view('suppliers.index', compact('suppliers')); // Llamar la vista correcta
    }

    public function create()
    {
        return view('suppliers.create'); // Llamar la vista para crear
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
        $supplier = suppliers::findOrFail($id);
        return view('suppliers.show', compact('supplier'));
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

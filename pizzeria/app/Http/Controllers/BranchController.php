<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();

        return view('branches.index', [
            'branches' => $branches
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $branch = new Branch();
        $branch->name = $request->input('name');
        $branch->address = $request->input('address');
        $branch->save();

        return view('branches.index', [
            'branches' => Branch::all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch = Branch::find($id);

        return view('branches.edit', [
            'branch' => $branch
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $branch = Branch::find($id);
        $branch->name = $request->input('name');
        $branch->address = $request->input('address');
        $branch->save();

        return view('branches.index', [
            'branches' => Branch::all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::find($id);
        $branch->delete();

        return view('branches.index', [
            'branches' => Branch::all()
        ]);
    }
}

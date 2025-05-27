<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
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

        return json_encode($branches);
    }

    private $validate = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255'
    ]);
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información.',
                'statusCode' => 400
            ]);
        }

        $branch = new Branch();
        $branch->name = $request->input('name');
        $branch->address = $request->input('address');
        $branch->save();

        $branches = Branch::all();

        return json_encode($branches);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = Branch::find($id);

        if (is_null($branch)) {
            return abort(404);
        }

        return json_encode($branch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($this->validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información.',
                'statusCode' => 400
            ]);
        }

        $branch = Branch::find($id);

        if (is_null($branch)) {
            return abort(404);
        }

        $branch->name = $request->input('name');
        $branch->address = $request->input('address');
        $branch->save();

        $branches = Branch::all();

        return json_encode($branches);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::find($id);

        if (is_null($branch)) {
            return abort(404);
        }

        $branch->delete();

        $branches = Branch::all();

        return json_encode($branches);
    }
}

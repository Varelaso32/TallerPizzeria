<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ExtraIngredients;


class ExtraIngredientController extends Controller
{
    private function getExtraIngredient()
    {
        $extraIngredients = DB::table('extra_ingredients')
            ->select('extra_ingredients.*')
            ->get();
        return $extraIngredients;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return json_encode($this->getExtraIngredient());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $extraIngredient = new ExtraIngredients();

        $extraIngredient->name = $request->name;
        $extraIngredient->price = $request->price;
        $extraIngredient->save();

        return json_encode($this->getExtraIngredient());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $extraIngredient = ExtraIngredients::find($id);

        return json_encode($extraIngredient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $extraIngredient = ExtraIngredients::find($id);

        $extraIngredient->name = $request->name;
        $extraIngredient->price = $request->price;
        $extraIngredient->save();

        return json_encode($this->getExtraIngredient());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $extraIngredient = ExtraIngredients::find($id);
        $extraIngredient->delete();

        return json_encode($this->getExtraIngredient());
    }
}

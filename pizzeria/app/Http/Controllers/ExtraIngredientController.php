<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ExtraIngredients;

class ExtraIngredientController extends Controller
{
    public function index()
    {
        $extraIngredients = DB::table('extra_ingredients')
            ->select('extra_ingredients.*')
            ->get();

        return view('extra_ingredients.index', ['extraIngredients' => $extraIngredients]);
    }

    public function create()
    {
        return view('extra_ingredients.new');
    }

    public function store(Request $request)
    {
        $extraIngredient = new ExtraIngredients();

        $extraIngredient->name = $request->name;
        $extraIngredient->price = $request->price;
        $extraIngredient->save();

        $extraIngredients = DB::table('extra_ingredients')
            ->select('extra_ingredients.*')
            ->get();

        return view('extra_ingredients.index', ['extraIngredients' => $extraIngredients]);
    }

        public function edit(string $id)
    {
        $extraIngredient = ExtraIngredients::find($id);

        return view('extra_ingredients.edit', ['extraIngredient' => $extraIngredient]);
    }

    public function update(Request $request, string $id)
    {
        $extraIngredient = ExtraIngredients::find($id);

        $extraIngredient->name = $request->name;
        $extraIngredient->price = $request->price;
        $extraIngredient->save();

        $extraIngredients = DB::table('extra_ingredients')
            ->select('extra_ingredients.*')
            ->get();

        return view('extra_ingredients.index', ['extraIngredients' => $extraIngredients]);
    }

    public function destroy(string $id)
    {
        $extraIngredient = ExtraIngredients::find($id);
        $extraIngredient->delete();

        $extraIngredients = DB::table('extra_ingredients')
            ->select('extra_ingredients.*')
            ->get();

        return view('extra_ingredients.index', ['extraIngredients' => $extraIngredients]);
    }
}

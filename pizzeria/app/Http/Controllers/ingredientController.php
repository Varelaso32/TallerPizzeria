<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = DB::table('ingredients')
            ->select('id', 'name', 'created_at', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ingredients.index', ['ingredients' => $ingredients]);
    }

    public function create()
    {
        return view('ingredients.new');
    }

    public function store(Request $request)
    {
        $ingredient = new Ingredient();
        $ingredient->name = $request->name;
        $ingredient->save();

        $ingredients = DB::table('ingredients')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ingredients.index', ['ingredients' => $ingredients]);
    }

    public function edit(string $id)
    {
        $ingredient = Ingredient::find($id);

        return view('ingredients.edit', ['ingredient' => $ingredient]);
    }

    public function update(Request $request, string $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->name = $request->name;
        $ingredient->save();

        $ingredients = DB::table('ingredients')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ingredients.index', ['ingredients' => $ingredients]);
    }

    public function destroy(string $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->delete();

        $ingredients = DB::table('ingredients')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ingredients.index', ['ingredients' => $ingredients]);
    }
}

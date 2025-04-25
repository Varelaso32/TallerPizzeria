<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PizzasController extends Controller
{
    public function index()
    {
        $pizzas = DB::table('pizzas')
            ->select('id', 'name', 'created_at', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pizzas.index', ['pizzas' => $pizzas]);
    }

    public function create()
    {
        return view('pizzas.new');  
    }

    public function store(Request $request)
    {

        $pizza = new Pizza();
        $pizza->name = $request->name;
        $pizza->save();

        $pizzas = DB::table('pizzas')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pizzas.index', ['pizzas' => $pizzas]);
    }

    public function edit(string $id)
    {
        $pizza = Pizza::find($id);

        return view('pizzas.edit', ['pizza' => $pizza]);
    }

    public function update(Request $request, string $id)
    {
        $pizza = Pizza::find($id);
        $pizza->name = $request->name;
        $pizza->save();

        $pizzas = DB::table('pizzas')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pizzas.index', ['pizzas' => $pizzas]);
    }

    public function destroy(string $id)
    {
        $pizza = Pizza::find($id);
        $pizza->delete();

        $pizzas = DB::table('pizzas')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pizzas.index', ['pizzas' => $pizzas]);
    }
}

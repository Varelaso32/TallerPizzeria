<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pizza;


class PizzasController extends Controller
{
    private function getPizzas()
    {
        $pizzas = DB::table('pizzas')
            ->select('id', 'name', 'created_at', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();

        return $pizzas;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return json_encode($this->getPizzas());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pizza = new Pizza();
        $pizza->name = $request->name;
        $pizza->save();

        return json_encode($this->getPizzas());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pizza = Pizza::find($id);

        return json_encode($pizza);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pizza = Pizza::find($id);

        $pizza->name = $request->name;
        $pizza->save();

        return json_encode($this->getPizzas());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizza = Pizza::find($id);
        $pizza->delete();

        return json_encode($this->getPizzas());
    }
}

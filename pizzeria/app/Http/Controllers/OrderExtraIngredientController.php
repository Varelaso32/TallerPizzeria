<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OrderExtraIngredient;

class OrderExtraIngredientController extends Controller
{
    private function getOrderExtraIngredients()
    {
        $orderExtraIngredients = DB::table('order_extra_ingredient')
            ->select([
                'order_extra_ingredient.*',
                'users.name as client_name',
                'extra_ingredients.name as extra_ingredient_name'
            ])
            ->join('orders', 'order_extra_ingredient.order_id', '=', 'orders.id')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->join('extra_ingredients', 'order_extra_ingredient.extra_ingredient_id', '=', 'extra_ingredients.id')
            ->get();
        return $orderExtraIngredients;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderExtraIngredients = $this->getOrderExtraIngredients();

        return view('order_extra_ingredients.index', [
            'order_extra_ingredients' => $orderExtraIngredients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Trae todas las ordenes
        $orders = DB::table('orders')
            ->select('orders.id', 'users.name as client_name')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->get();

        // Trae todos los ingredientes extra
        $extraIngredients = DB::table('extra_ingredients')
            ->select('id', 'name')
            ->get();

        return view('order_extra_ingredients.new', [
            'extra_ingredients' => $extraIngredients,
            'orders' => $orders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderExtraIngredient = new OrderExtraIngredient();
        $orderExtraIngredient->order_id = $request->input('order_id');
        $orderExtraIngredient->extra_ingredient_id = $request->input('extra_ingredient_id');
        $orderExtraIngredient->quantity = $request->input('quantity');
        $orderExtraIngredient->save();

        return view('order_extra_ingredients.index', [
            'order_extra_ingredients' => $this->getOrderExtraIngredients()
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
        $orderExtraIngredient = OrderExtraIngredient::find($id);

        // Trae todas las ordenes
        $orders = DB::table('orders')
            ->select('id', 'users.name as client_name')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->get();

        // Trae todos los ingredientes extra
        $extraIngredients = DB::table('extra_ingredients')
            ->select('id', 'name')
            ->get();

        return view('order_extra_ingredients.edit', [
            'order_extra_ingredient' => $orderExtraIngredient,
            'extra_ingredients' => $extraIngredients,
            'orders' => $orders
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orderExtraIngredient = OrderExtraIngredient::find($id);
        $orderExtraIngredient->order_id = $request->input('order_id');
        $orderExtraIngredient->extra_ingredient_id = $request->input('extra_ingredient_id');
        $orderExtraIngredient->quantity = $request->input('quantity');
        $orderExtraIngredient->save();

        return view('order_extra_ingredients.index', [
            'order_extra_ingredients' => $this->getOrderExtraIngredients()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderExtraIngredient = OrderExtraIngredient::find($id);
        $orderExtraIngredient->delete();

        return view('order_extra_ingredients.index', [
            'order_extra_ingredients' => $this->getOrderExtraIngredients()
        ]);
    }
}

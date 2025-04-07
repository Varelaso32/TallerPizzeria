<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderExtraIngredientController extends Controller
{
    private function getOrderExtraIngredients()
    {
        $orderExtraIngredients = DB::table('order_extra_ingredient')
            ->select([
                'order_extra_ingredients.*',
                'users.name as client_name',
                'extra_ingredients.name as extra_ingredient_name'
            ])
            ->join('orders', 'order_extra_ingredients.order_id', '=', 'orders.id')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->join('extra_ingredients', 'order_extra_ingredients.extra_ingredient_id', '=', 'extra_ingredients.id')
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
            ->select('id', 'users.name as client_name')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->get();

        // Trae todos los ingredientes extra
        $extraIngredients = DB::table('extra_ingredients')
            ->select('id', 'name')
            ->get();

        return view('order_extra_ingredients.create', [
            'extra_ingredients' => $extraIngredients,
            'orders' => $orders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

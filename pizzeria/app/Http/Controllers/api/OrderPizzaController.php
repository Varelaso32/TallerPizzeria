<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\order_pizza;

class OrderPizzaController extends Controller
{
    private function getOrdersPizzas()
    {
        $orderPizzas = DB::table('order_pizza')
            ->join('orders', 'order_pizza.order_id', '=', 'orders.id')
            ->join('pizza_size', 'order_pizza.pizza_size_id', '=', 'pizza_size.id')
            ->select(
                'order_pizza.*',
                'orders.id as order_id',
                'orders.created_at as order_created_at',
                'pizza_size.price as pizza_size_price'
            )
            ->get();

        return $orderPizzas;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return json_encode($this->getOrdersPizzas());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderPizza = new order_pizza();

        $orderPizza->order_id = $request->order_id;
        $orderPizza->pizza_size_id = $request->pizza_size_id;
        $orderPizza->quantity = $request->quantity;
        $orderPizza->save();

        return json_encode($this->getOrdersPizzas());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orderPizza = order_pizza::find($id);

        return json_encode($orderPizza);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orderPizza = order_pizza::find($id);

        $orderPizza->order_id = $request->order_id;
        $orderPizza->pizza_size_id = $request->pizza_size_id;
        $orderPizza->quantity = $request->quantity;
        $orderPizza->save();

        return json_encode($this->getOrdersPizzas());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderPizza = order_pizza::find($id);
        $orderPizza->delete();

        return json_encode($this->getOrdersPizzas());
    }
}

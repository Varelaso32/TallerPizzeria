<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\order_pizza;

class OrderPizzaController extends Controller
{
    public function index()
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

        return view('order_pizza.index', ['orderPizzas' => $orderPizzas]);
    }
    

}

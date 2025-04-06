<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = DB::table('orders')
            ->select([
                'orders.*',
                'branches.name as branch_name',
                'emp_user.name as employee_name',
                'cli_user.name as client_name'
            ])
            ->join('branches', 'orders.branch_id', '=', 'branches.id')
            ->join('employees', 'orders.delivery_person_id', '=', 'employees.id')
            ->join('users as emp_user', 'employees.user_id', '=', 'emp_user.id')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('users as cli_user', 'clients.user_id', '=', 'cli_user.id')
            ->get();

        return view('orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Trae todos los clientes
        $clients = DB::table('clients')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->select('clients.id', 'users.name')
            ->get();

        // Trae todas las sucursales
        $branches = DB::table('branches')
            ->select('id', 'name')
            ->get();

        // Solo trae los mensajeros
        $delivery_persons = DB::table('employees')
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->select('employees.id', 'users.name')
            ->where('employees.position', 'mensajero')
            ->get();

        return view('orders.create', [
            'clients' => $clients,
            'branches' => $branches,
            'delivery_persons' => $delivery_persons
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->client_id = $request->input('client_id');
        $order->branch_id = $request->input('branch_id');
        $order->total_price = $request->input('total_price');
        $order->status = $request->input('status');
        $order->delivery_type = $request->input('delivery_type');
        $order->delivery_person_id = $request->input('delivery_person_id');
        $order->save();

        $orders = DB::table('orders')
            ->select([
                'orders.*',
                'branches.name as branch_name',
                'emp_user.name as employee_name',
                'cli_user.name as client_name'
            ])
            ->join('branches', 'orders.branch_id', '=', 'branches.id')
            ->join('employees', 'orders.delivery_person_id', '=', 'employees.id')
            ->join('users as emp_user', 'employees.user_id', '=', 'emp_user.id')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('users as cli_user', 'clients.user_id', '=', 'cli_user.id')
            ->get();

        return view('orders.index', [
            'orders' => $orders
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
        $order = Order::find($id);

        // Trae todos los clientes
        $clients = DB::table('clients')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->select('clients.id', 'users.name')
            ->get();

        // Trae todas las sucursales
        $branches = DB::table('branches')
            ->select('id', 'name')
            ->get();

        // Solo trae los mensajeros
        $delivery_persons = DB::table('employees')
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->select('employees.id', 'users.name')
            ->where('employees.position', 'mensajero')
            ->get();

        return view('orders.edit', [
            'order' => $order,
            'clients' => $clients,
            'branches' => $branches,
            'delivery_persons' => $delivery_persons
        ]);
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

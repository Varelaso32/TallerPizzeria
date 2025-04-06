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
        //
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

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Validator;

class OrderController extends Controller
{
    private function getOrders()
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
        return $orders;
    }

    private $validate = Validator::make($request->all(), [
        'client_id' => 'required|exists:clients,id',
        'branch_id' => 'required|exists:branches,id',
        'total_price' => 'required|numeric|min:0',
        'status' => 'required|in:pendiente,en_preparacion,listo,entregado',
        'delivery_type' => 'required|in:en_local,a_domicilio',
        'delivery_person_id' => 'nullable|exists:employees,id'
    ]);
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = $this->getOrders();
        return json_encode($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información.',
                'statusCode' => 400
            ]);
        }

        $order = new Order();
        $order->client_id = $request->input('client_id');
        $order->branch_id = $request->input('branch_id');
        $order->total_price = $request->input('total_price');
        $order->status = $request->input('status');
        $order->delivery_type = $request->input('delivery_type');
        $order->delivery_person_id = $request->input('delivery_person_id');
        $order->save();

        $orders = $this->getOrders();
        return json_encode($orders);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);

        if (is_null($order)) {
            return abort(404);
        }

        return json_encode($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($this->validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información.',
                'statusCode' => 400
            ]);
        }

        $order = Order::find($id);

        if (is_null($order)) {
            return abort(404);
        }

        $order->client_id = $request->input('client_id');
        $order->branch_id = $request->input('branch_id');
        $order->total_price = $request->input('total_price');
        $order->status = $request->input('status');
        $order->delivery_type = $request->input('delivery_type');
        $order->delivery_person_id = $request->input('delivery_person_id');
        $order->save();

        $orders = $this->getOrders();
        return json_encode($orders);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);

        if (is_null($order)) {
            return abort(404);
        }

        $order->delete();

        $orders = $this->getOrders();
        return json_encode($orders);
    }
}

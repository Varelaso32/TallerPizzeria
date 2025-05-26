<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Clients;

class ClientsController extends Controller
{
    /**
     * Obtener todos los clientes con información del usuario.
     */
    private function getClients()
    {
        $clients = DB::table('clients')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->select([
                'clients.*',
                'users.name as user_name',
                'users.email as user_email',
                'users.role as user_role'
            ])
            ->get();

        return $clients;
    }

    /**
     * Mostrar todos los clientes.
     */
    public function index()
    {
        $clients = $this->getClients();
        return response()->json($clients);
    }

    /**
     * Crear un nuevo cliente.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }
        $client = new Clients();
        $client->user_id = $request->input('user_id');
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');
        $client->save();

        $clients = $this->getClients();
        return response()->json($clients);
    }

    /**
     * Mostrar un cliente específico.
     */
    public function show(string $id)
    {
        $client = Clients::find($id);
        return response()->json($client);
    }

    /**
     * Actualizar un cliente.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $client = Clients::find($id);
        $client->user_id = $request->input('user_id');
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');
        $client->save();

        $clients = $this->getClients();
        return response()->json($clients);
    }

    /**
     * Eliminar un cliente.
     */
    public function destroy(string $id)
    {
        $client = Clients::find($id);
        $client->delete();

        $clients = $this->getClients();
        return response()->json($clients);
    }
}

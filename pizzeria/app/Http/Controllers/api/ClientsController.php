<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return json_encode($clients);
    }

    /**
     * Crear un nuevo cliente.
     */
    public function store(Request $request)
    {
        $client = new Clients();
        $client->user_id = $request->input('user_id');
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');
        $client->save();

        $clients = $this->getClients();
        return json_encode($clients);
    }

    /**
     * Mostrar un cliente específico.
     */
    public function show(string $id)
    {
        $client = Clients::find($id);
        return json_encode($client);
    }

    /**
     * Actualizar un cliente.
     */
    public function update(Request $request, string $id)
    {
        $client = Clients::find($id);
        $client->user_id = $request->input('user_id');
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');
        $client->save();

        $clients = $this->getClients();
        return json_encode($clients);
    }

    /**
     * Eliminar un cliente.
     */
    public function destroy(string $id)
    {
        $client = Clients::find($id);
        $client->delete();

        $clients = $this->getClients();
        return json_encode($clients);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Clients;

class ClientsController extends Controller
{
    
    public function index()
    {
        $clients = DB::table('clients')
        ->join('users', 'clients.user_id', '=', 'users.id')
        ->select('clients.*', 'users.name as user_name', 'users.email as user_email', 'users.role as user_role')
        ->get();

        return view('clients.index', ['clients' => $clients]);
    }


    public function create()
    {
        $users = DB::table('users')
        ->orderBy('name')
        ->get();

        return view('clients.new', ['users' => $users]);
    }

    
    public function store(Request $request)
    {
        $client = new Clients();

        $client->user_id = $request->user_id;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->save();

        $clients = DB::table('clients')
        ->join('users', 'clients.user_id', '=', 'users.id')
        ->select('clients.*', 'users.name as user_name', 'users.email as user_email', 'users.role as user_role')
        ->get();

        return view('clients.index', ['clients' => $clients]);
    }

   
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $client = Clients::find($id);

        $users = DB::table('users')
            ->orderBy('name')
            ->get();

        return view('clients.edit', ['client' => $client, 'users' => $users]);
    }

    
    public function update(Request $request, string $id)
    {
        $client = Clients::find($id);

        $client->user_id = $request->user_id;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->save();

        $clients = DB::table('clients')
        ->join('users', 'clients.user_id', '=', 'users.id')
        ->select('clients.*', 'users.name as user_name', 'users.email as user_email', 'users.role as user_role')
        ->get();

        return view('clients.index', ['clients' => $clients]);
    }

    
    public function destroy(string $id)
    {
        $client = Clients::find($id);
        $client->delete();

        $clients = DB::table('clients')
        ->join('users', 'clients.user_id', '=', 'users.id')
        ->select('clients.*', 'users.name as user_name', 'users.email as user_email', 'users.role as user_role')
        ->get();

        return view('clients.index', ['clients' => $clients]);
    }
}

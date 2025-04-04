<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;

class UsersController extends Controller
{

    public function index()
    {
        $users = DB::table('users')
            ->select('id', 'name', 'email', 'role', 'created_at', 'updated_at')
            ->get();

        return view('users.index', ['users' => $users]);
    }


    public function create()
    {
        return view('users.new');
    }


    public function store(Request $request)
    {
        $user = new Users();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); 
        $user->role = $request->role;
        $user->save();

        $users = DB::table('users')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('users.index', ['users' => $users]);
    }


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
        $user = Users::find($id);
        $user->delete();

        $users = DB::table('users')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('users.index', ['users' => $users]);
    }
}

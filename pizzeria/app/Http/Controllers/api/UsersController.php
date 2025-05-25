<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;

class UsersController extends Controller
{
    /**
     * Método privado reutilizable para obtener los usuarios
     */
    private function getUsers()
    {
        return DB::table('users')
            ->select('id', 'name', 'email', 'role', 'created_at', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Muestra una lista de todos los usuarios
     */
    public function index()
    {
        $users = $this->getUsers();
        return json_encode($users);
    }

    /**
     * Almacena un nuevo usuario
     */
    public function store(Request $request)
    {
        $user = new Users();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        $users = $this->getUsers();
        return json_encode($users);
    }

    /**
     * Muestra un usuario específico
     */
    public function show(string $id)
    {
        $user = Users::find($id);
        return json_encode($user);
    }

    /**
     * Actualiza un usuario existente
     */
    public function update(Request $request, string $id)
    {
        $user = Users::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        if (!empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        $users = $this->getUsers();
        return json_encode($users);
    }

    /**
     * Elimina un usuario
     */
    public function destroy(string $id)
    {
        $user = Users::find($id);
        $user->delete();

        $users = $this->getUsers();
        return json_encode($users);
    }
}

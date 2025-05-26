<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
        return response()->json($users);
    }

    /**
     * Almacena un nuevo usuario
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', 'string', 'in:admin,client,employee'] // Ajustá según roles válidos
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $user = new Users();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        $users = $this->getUsers();
        return response()->json($users);
    }

    /**
     * Muestra un usuario específico
     */
    public function show(string $id)
    {
        $user = Users::find($id);
        return response()->json($user);
    }

    /**
     * Actualiza un usuario existente
     */
    public function update(Request $request, string $id)
    {
        $user = Users::find($id);

        if (!$user) {
            return response()->json([
                'msg' => 'Usuario no encontrado.',
                'statusCode' => 404
            ], 404);
        }

        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => ['nullable', 'string', 'min:6'],
            'role' => ['required', 'string', 'in:admin,client,employee'] // Ajustá los valores válidos
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        if (!empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        $users = $this->getUsers();
        return response()->json($users);
    }

    /**
     * Elimina un usuario
     */
    public function destroy(string $id)
    {
        $user = Users::find($id);
        $user->delete();

        $users = $this->getUsers();
        return response()->json($users);
    }
}

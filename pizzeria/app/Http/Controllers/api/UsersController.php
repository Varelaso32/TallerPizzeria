<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Users;

class UsersController extends Controller
{
    private function getUsers()
    {
        return DB::table('users')
            ->select('id', 'name', 'email', 'role', 'created_at', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function index()
    {
        return response()->json($this->getUsers());
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', 'string', 'in:cliente,empleado']
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
        $user->password = Hash::make($request->input('password')); // Hasheado
        $user->role = $request->input('role');
        $user->save();

        return response()->json($this->getUsers());
    }

    public function show(string $id)
    {
        return response()->json(Users::find($id));
    }

    public function update(Request $request, string $id)
    {
        $user = Users::find($id);

        if (!$user) {
            return response()->json(['msg' => 'Usuario no encontrado.'], 404);
        }

        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => ['nullable', 'string', 'min:6'],
            'role' => ['required', 'string', 'in:cliente,empleado']
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
            $user->password = Hash::make($request->input('password')); // Hasheado
        }

        $user->save();

        return response()->json($this->getUsers());
    }

    public function destroy(string $id)
    {
        $user = Users::find($id);
        $user->delete();

        return response()->json($this->getUsers());
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Users::where('email', $request->email)->first();

        if (!$user) {
            Log::debug('Correo no encontrado: ' . $request->email);
            return response()->json(['msg' => 'Credenciales incorrectas.'], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            Log::debug('Contraseña no coincide para el usuario: ' . $request->email);
            Log::debug('Password enviado: ' . $request->password);
            Log::debug('Hash en BD: ' . $user->password);
            return response()->json(['msg' => 'Credenciales incorrectas.'], 401);
        }

        Log::debug('Login exitoso para: ' . $user->email);

        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ]
        ]);
    }
}

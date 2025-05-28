<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Employes;

class EmployesController extends Controller
{
    /**
     * Obtener todos los empleados con información del usuario.
     */
    private function getEmployees()
    {
        $employees = DB::table('employees')
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->select([
                'employees.*',
                'users.name as user_name',
                'users.email as user_email',
                'users.role as user_role'
            ])
            ->get();

        return $employees;
    }

    /**
     * Mostrar todos los empleados.
     */
    public function index()
    {
        $employees = $this->getEmployees();
        return response()->json($employees);
    }

    /**
     * Crear un nuevo empleado.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'position' => ['required', 'in:cajero,administrador,cocinero,mensajero'],
            'identification_number' => ['required', 'string', 'max:50', 'unique:employees,identification_number'],
            'salary' => ['required', 'numeric', 'min:0'],
            'hire_date' => ['required', 'date']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $employee = new Employes();
        $employee->user_id = $request->input('user_id');
        $employee->position = $request->input('position');
        $employee->identification_number = $request->input('identification_number');
        $employee->salary = $request->input('salary');
        $employee->hire_date = $request->input('hire_date');
        $employee->save();

        $employees = $this->getEmployees();
        return response()->json($employees);
    }

    /**
     * Mostrar un empleado específico.
     */
    public function show(string $id)
    {
        $employee = Employes::find($id);
        return response()->json($employee);
    }

    /**
     * Actualizar un empleado.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'position' => ['required', 'in:cajero,administrador,cocinero,mensajero'],
            'identification_number' => ['required', 'string', 'max:50', 'unique:employees,identification_number,' . $id],
            'salary' => ['required', 'numeric', 'min:0'],
            'hire_date' => ['required', 'date']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Error de validación.',
                'errors' => $validate->errors(),
                'statusCode' => 400
            ], 400);
        }

        $employee = Employes::find($id);
        $employee->user_id = $request->input('user_id');
        $employee->position = $request->input('position');
        $employee->identification_number = $request->input('identification_number');
        $employee->salary = $request->input('salary');
        $employee->hire_date = $request->input('hire_date');
        $employee->save();

        $employees = $this->getEmployees();
        return response()->json($employees);
    }

    /**
     * Eliminar un empleado.
     */
    public function destroy(string $id)
    {
        $employee = Employes::find($id);
        $employee->delete();

        $employees = $this->getEmployees();
        return response()->json($employees);
    }
}

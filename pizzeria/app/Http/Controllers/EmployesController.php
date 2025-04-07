<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employes;

class EmployesController extends Controller
{
    
    public function index()
    {
        $employees = DB::table('employees')
        ->join('users', 'employees.user_id', '=', 'users.id')
        ->select(
            'employees.*', 
            'users.name as user_name', 
            'users.email as user_email', 
            'users.role as user_role'
        )
        ->get();

    return view('employees.index', ['employees' => $employees]);
    }

    
    public function create()
    {
        $users = DB::table('users')
            ->orderBy('name')
            ->get();

        return view('employees.new', ['users' => $users]);
    }

    
    public function store(Request $request)
    {
        $employee = new Employes();

        $employee->user_id = $request->user_id;
        $employee->position = $request->position;
        $employee->identification_number = $request->identification_number;
        $employee->salary = $request->salary;
        $employee->hire_date = $request->hire_date;
        $employee->save();

        $employees = DB::table('employees')
        ->join('users', 'employees.user_id', '=', 'users.id')
        ->select(
            'employees.*', 
            'users.name as user_name', 
            'users.email as user_email', 
            'users.role as user_role'
        )
        ->get();

        return view('employees.index', ['employees' => $employees]);
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $employee = Employes::find($id);

        $users = DB::table('users')
            ->orderBy('name')
            ->get();

        return view('employees.edit', ['employee' => $employee, 'users' => $users]);


    }

    
    public function update(Request $request, string $id)
    {
        $employee = Employes::find($id);

        $employee->user_id = $request->user_id;
        $employee->position = $request->position;
        $employee->identification_number = $request->identification_number;
        $employee->salary = $request->salary;
        $employee->hire_date = $request->hire_date;
        $employee->save();

        $employees = DB::table('employees')
        ->join('users', 'employees.user_id', '=', 'users.id')
        ->select(
            'employees.*', 
            'users.name as user_name', 
            'users.email as user_email', 
            'users.role as user_role'
        )
        ->get();

        return view('employees.index', ['employees' => $employees]);
    }

    
    public function destroy(string $id)
    {
        $client = Employes::find($id);
        $client->delete();

        $employees = DB::table('employees')
        ->join('users', 'employees.user_id', '=', 'users.id')
        ->select(
            'employees.*', 
            'users.name as user_name', 
            'users.email as user_email', 
            'users.role as user_role'
        )
        ->get();

        return view('employees.index', ['employees' => $employees]);
    }
}

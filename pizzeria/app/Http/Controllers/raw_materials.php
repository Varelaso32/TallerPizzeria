<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class raw_materials extends Controller
{
    public function index()
    {
        $raw_materials = DB::table('raw_materials')
        ->select('id', 'name', 'unit', 'current_stock','created_at', 'updated_at')
        ->get();

        return view('raw_materials.index',['raw_materials' => $raw_materials]); 
    }
}

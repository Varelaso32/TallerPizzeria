<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ExtraIngredientController extends Controller
{
    public function index()
    {
        $extraIngredients = DB::table('extra_ingredients')
            ->select('extra_ingredients.*')
            ->get();

        return view('extra_ingredients.index', ['extraIngredients' => $extraIngredients]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class suppliers extends Model
{
    use HasFactory;

    protected $table = 'suppliers'; 
    protected $primaryKey = 'id'; 
    public $timestamps = false; 

}

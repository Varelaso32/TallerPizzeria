<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pizza_ingredient extends Model
{
    use HasFactory;
    
    protected $table = 'pizza_ingredient';         
    protected $primaryKey = 'id';       
    public $timestamps = false; 
}

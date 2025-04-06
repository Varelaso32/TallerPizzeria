<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $table = 'purchases'; 
    protected $primaryKey = 'id'; 
    public $timestamps = false;
}

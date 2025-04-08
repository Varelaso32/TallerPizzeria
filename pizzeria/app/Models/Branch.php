<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'branches';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'address',
    ];

    public $timestamps = true;
}

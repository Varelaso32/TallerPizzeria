<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    protected $table = 'pizzas';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function sizes()
    {
    return $this->hasMany(PizzaSize::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relación con tamaños
    public function sizes()
    {
        return $this->hasMany(PizzaSize::class);
    }

    // Relación con ingredientes
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'pizza_ingredients')
                    ->withPivot('quantity');
    }
}
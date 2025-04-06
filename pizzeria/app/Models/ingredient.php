<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['pizza_id', 'ingredient_id', 'quantity'];

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id'); // si tienes un catálogo de ingredientes con este modelo
    }
}

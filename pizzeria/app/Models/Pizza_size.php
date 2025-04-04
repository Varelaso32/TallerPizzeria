<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza_size extends Model
{
    use HasFactory;

    protected $table = 'pizza_size';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 
        'price'];
    public $timestamps = false;
    public function pizzas()
    {
        return $this->hasMany(Pizzas::class, 'size_id');
    }
  

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, 'size_id');
    }
}

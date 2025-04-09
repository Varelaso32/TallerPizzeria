<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderExtraIngredient extends Model
{
    use HasFactory;

    protected $table = 'order_extra_ingredient';

    protected $fillable = [
        'order_id',
        'extra_ingredient_id',
        'quantity'
    ];
}

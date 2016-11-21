<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variants extends Model
{

    protected $table = 'variants';

    protected $fillable = [
        'products_id',
        'color_id',
        'units_id_one',
        'units_id_too',
        'price_one',
        'price_too',
        'compare_price_one',
        'compare_price_too',
        'stock_one',
        'stock_too',
        'heft_one',
        'heft_too'

    ];
}

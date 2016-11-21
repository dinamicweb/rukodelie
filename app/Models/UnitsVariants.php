<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitsVariants extends Model
{

    protected $table = 'variants_units';

    protected $filltable =
        [

            'variants_id',
            'units_id',
            'price',
            'compare_price',
            'stock',
            'heft',
            'count_unit'

        ];


}

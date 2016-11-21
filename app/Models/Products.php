<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Products extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='products';
    protected $fillable = [
        'title', 'url', 'sku', 'category_id', 'description', 'img', 'heft', 'new'
    ];




}

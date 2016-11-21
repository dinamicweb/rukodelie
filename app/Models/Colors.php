<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Colors extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='colors';
    protected $fillable = [
        'title_colors',
    ];




}

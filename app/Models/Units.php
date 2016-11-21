<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Units extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='units';
    protected $fillable = [
        'title_units', 'title_units_abb', 'type'
    ];




}

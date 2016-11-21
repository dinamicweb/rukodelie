<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='category';
    protected $fillable = [
        'name', 'url', 'title_meta', 'description_meta', 'keywords_meta', 'img', 'parent_id', 'display'
    ];

    public function getCategoryId($url){

        $category=DB::table('category')
            ->where('url', $url)
            ->first();

        return $category->id;
    }


    public function subCategory($id){

        $category=DB::table('category')
            ->where('parent_id', $id)
            ->get();


        if(empty($category)){

            return false;
        }else{

            return $category;
        }
    }


}

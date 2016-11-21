<?php
namespace App\Helpers;

use App\Models\Products;
use DB;

class ProductHelpers
{

    public static function getNameProduct($id){

        $product=DB::table('products')->where('id', $id)->first();

        return $product->title;
    }

    public static function getImgProduct($id){

        $product=DB::table('products')->where('id', $id)->first();

        return $product->img;
    }

}
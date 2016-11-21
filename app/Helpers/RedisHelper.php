<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Redis;
use DB;

class RedisHelper
{

//�������� ������� ��������� �� redis
    public static function GetCashedCategoryArr()
    {

        $redis = Redis::connection();

        $category = $redis->get('category');

        return $category;
    }


//    ������������ ������� ��������� ����� ��������� � Mysql � ������� category
    public static function AddCashedCategory()
    {

       $category=DB::table('category')->get();

//        dd($category);

       $redis=Redis::connection();

       $redis->set('category', json_encode($category));


    }

}
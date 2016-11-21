<?php

namespace App\Http\Controllers;

use App\Helpers\CategoryHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests;

class MainController extends Controller
{

    public function index()
    {

        $category = CategoryHelpers::getArrCategoryParent();





        return view('main', ['category' => $category]);

    }

    public function SuccessfulRegistration()
    {

        return view('successful_registration');
    }

    public function contact(){

        return view('contact');
    }

    public function redis()
    {

        $redis = Redis::connection();

        echo $redis->get('name');


    }
}

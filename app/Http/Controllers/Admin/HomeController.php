<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

       return view('layouts.app');
    }


    public function news(){

        dd(1);
    }

    public function actions(){

        dd(1);
    }
}

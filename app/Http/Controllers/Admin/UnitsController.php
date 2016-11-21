<?php

namespace App\Http\Controllers\Admin;

use App\Models\Units;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UnitsController extends Controller
{

    public function store(){

        return view('admin.units.store');
    }


    public function create(Request $request){

          $units=new Units();

          $units->title_units=$request->title_units;
          $units->title_units_abb=$request->title_units_abb;
          $units->type=$request->type;


          $units->save();

            return redirect('/admin/units')->with('success', 'Еденица измерения добавлена');
    }


    public function show (){

        $units=Units::all();

        return view('admin.units.show', ['units'=>$units]);
    }
}

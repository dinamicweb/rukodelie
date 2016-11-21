<?php
namespace App\Helpers;

use DB;

class UnitsHelper
{

    public static function UnitsOptGetList()
    {

        $unitsOpt=DB::table('units')->get();

        $units='';

        foreach($unitsOpt as $unit){
            $units.='<option value="'.$unit->id.'">';
            $units.=$unit->title_units;
            $units.='</option>';

        }
        return $units;

    }

    public static function UnitsRozGetList()
    {

        $unitsOpt=DB::table('units')->where('type', 2)->get();

        $units='';

        foreach($unitsOpt as $unit){
            $units.='<option value="'.$unit->id.'">';
            $units.=$unit->title_units;
            $units.='</option>';

        }
        return $units;

    }

    public static function getNameUnits($id){

        $units=DB::table('units')->where('id', $id)->first();


        return $units->title_units;

    }

    public static function getNameAbbUnits($id){

        $units=DB::table('units')->where('id', $id)->first();


        return $units->title_units_abb;

    }

    public  static function getMinUnitsPrice($units){

        $price1=$units[0]->price;
        $price2=$units[1]->price;

        if($price1>$price2){
            return $price2;
        }else if($price1<$price2){
            return  $price1;
        }

    }


    public static function getMinUnitsComparePrice($units){

        $price1=$units[0]->price;
        $price2=$units[1]->price;

        if($price1>$price2){
            return $units[1]->compare_price;
        }else if($price1<$price2){
            return  $units[0]->compare_price;
        }

    }

}
<?php
namespace App\Helpers;

use DB;

class ColorsHelper
{

    public static function colorsGetList()
    {

            $colorsOpt=DB::table('colors')->get();

            $colors='';

            foreach($colorsOpt as $color){
                $colors.='<option value="'.$color->id.'">';
                $colors.=$color->title_colors;
                $colors.='</option>';

            }
        return $colors;

    }


    public static function getNameColor($id){

        $color=DB::table('colors')->where('id', $id)->first();

        return $color->title_colors;

    }


}
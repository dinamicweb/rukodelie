<?php
namespace App\Helpers;

use DB;

class CategoryHelpers
{

    public static function getParentCategoryView()
    {

        $category = DB::table('category')
            ->where('parent_id', 0)
            ->where('display', 1)
            ->get();

        $nav_left = '';


        foreach ($category as $c) {

            $nav_left .= '<li>';
            $nav_left .= '<a href="/catalog/' . $c->url . '" id="lst">' . $c->name . '</a>';

            $cat=new CategoryHelpers();
            $nav_left .= $cat->getChildrenCategory($c->id);

            $nav_left .= '</li>';

        }

        return $nav_left;

    }


    static function getChildrenCategory($id){

        $childrenCategory=DB::table('category')
            ->where('parent_id', $id)
            ->get();

        if(empty($childrenCategory)){


        }else {

            $navChild='';

            $navChild .= '<ul>';

            foreach ($childrenCategory as $c) {

                $navChild .= '<li>';

                $navChild .='<a href="/catalog/' . $c->url . '" id="lst">' . $c->name . '</a>';

                $navChild .='</li>';


            }


            $navChild .='</ul>';
            return $navChild;
        }


    }


//ѕолучение списка родительских категорий
    public static function getParentCategory()
    {

        $category = DB::table('category')
//            ->where('parent_id', 0)
            ->get();

        $nav_left = '';


        foreach ($category as $c) {

            $nav_left .= '<option value="'.$c->id.'" >';
            $nav_left .=  $c->name;
            $nav_left .= '</option>';

        }

        return $nav_left;

    }

//    ѕолучение имени родительской категории

    public static function getParentCategoryName($id)
    {

        $category = DB::table('category')
            ->where('id', $id)
            ->first();



        return $category->name;

    }

    public static function getArrCategoryParent(){
        $category = DB::table('category')
            ->where('parent_id', 0)
            ->where('display', 1)
            ->get();
        return $category;
    }


//    ѕолучение всех категорий
    public static function getCategoryList(){
        $category = DB::table('category')

            ->get();
        $categorys = '';


        foreach ($category as $c) {

            $categorys .= '<option value="'.$c->id.'" >';
            $categorys .=  $c->name;
            $categorys .= '</option>';

        }


        return $categorys;
    }



    public static function tree_category(){

        $cashed=new RedisHelper();
        $categoryes=$cashed->GetCashedCategoryArr();

        $categoryes=\GuzzleHttp\json_decode($categoryes);

        if($categoryes==null){
            $categoryes=DB::table('category')->get();

        }



        $category=[];
        $i=0;
        foreach($categoryes as $c){
            $category[$i]=$c;
            $i++;
        }
        $cats=[];
        foreach($category as $cat){
            $cats_ID[$cat->id][] = $cat;
            $cats[$cat->parent_id][$cat->id] =  $cat;
        }
        $arr_category=new CategoryHelpers();
        $cat=$arr_category->build_tree($cats, 0);
        return $cat;
    }


    public static function build_tree($cats, $parent_id, $only_parent = false)
    {
        if (is_array($cats) and isset($cats[$parent_id])) {
            $tree = '';
            if ($only_parent == false) {
                foreach ($cats[$parent_id] as $cat) {
                    if (isset($cats[$cat->id])) {
                        $url = '/';
                    } else {
                        $url = '/catalog/' . $cat->url;
                    }

                    if (isset($cats[$cat->id])) {
                        if($cats[$parent_id][$cat->id]->parent_id>0){
                            $tree .= '<li >';
                            $tree .= '<a class="index_lst" href="' . $url . '" > ' . $cat->name . '</a>';
                        }else{
                            $tree .= '<li >';
                            $tree .= '<a class="index_lst" href="' . $url . '" > ' . $cat->name. '</a>';
                        }
                        $tree .= '<ul class="no_active">';
                        $cc=new CategoryHelpers();
                        $tree .= $cc->build_tree($cats, $cat->id);
                        $tree .='</ul>';
                        $tree .= '</li>';


                    } else {
                        $tree .= '<li ><a class="index_lst" href="' . $url . '"> ' . $cat->name . '</a>';

                        $cc=new CategoryHelpers();
                        $tree .= $cc->build_tree($cats, $cat->id);

                        $tree .= '</li>';
                    }
                }

            } elseif (is_numeric($only_parent)) {



            }
        } else return null;
        return $tree;
    }

}
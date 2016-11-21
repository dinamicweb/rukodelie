<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $url = $request->category;
        $category = new Category();
        $id = $category->getCategoryId($url);
        $subCategory = $category->subCategory($id);
        if ($subCategory == false) {

            $products = $this->products($id);
//            dd($products);
            return view('products', ['products' => $products]);

        } else {
            return view('catalog', ['category' => $subCategory, 'id' => $id]);
        }
    }

    protected function products($id)
    {

//        Получаем товары категории
        $products = DB::table('products')->get();



//        Для каждого товара получаем цвета
        foreach ($products as $product) {

            $colors = $this->GetProductVariant($product->id);
            $product->colors = $colors;
        }

//        Для каждого товара получаем еденицы измерения
        //        Для каждого товара получаем цвета
        foreach ($products as $product) {

            $units = $this->GetVariantUnits($product->id);
            $product->units = $units;
        }

//        dd($products);

        return $products;

    }


//Получение всех цветов товара
    protected function GetProductVariant($id)
    {
//Получаем цвета
        $variant = DB::table('variants')->where('products_id', $id)->get();
        return $variant;
    }



   protected function GetVariantUnits($id){

        $unints=DB::table('variants_units')->where('product_id', $id)->get();

        return $unints;
    }

//Карточка товара
    public function product($url)
    {

        $product=DB::table('products')->where('url', $url)->first();

        $catalog = new CatalogController();

        $variants = $catalog->GetProductVariant($product->id);
        $product->variants = $variants;


        return view('product', ['product'=>$product]);
    }

//Выясняем цену ед. измерения товара
    public function ChangeUnitsProducts(Request $request){

        $product_id=$request->product_id;
        $units_id=$request->units;

        $product=DB::table('variants_units')
            ->where('product_id', $product_id)
            ->where('units_id', $units_id)
            ->where('stock', '>', '0')
            ->first();


            return response()->json(['success'=>1, 'product'=>$product]);

    }


}

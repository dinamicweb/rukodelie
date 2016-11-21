<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Products::all();
        return view('admin.products.show', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

            $product=new Products();

            $product->title=$request->name;
            $product->url=TranslitController::str2url($request->name);
            $product->sku=$request->sku;
            $product->category_id=$request->category_id;
            $product->description=$request->description;

            if(!isset($request->new)){
                $product->new=0;
            }else{
                $product->new=$request->new;
            }
            $product->heft=$request->heft;

        if (empty($request->file('file'))) {

            $product->img = 'nophoto.png';

        } else {

            $file = $request->file('file');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = TranslitController::str2url($filename);
            $filename = $filename . '-' . time() . '.' . $extension;
            $product->img = $filename;
            $request->file('file')->move('upload/products', $filename);
        }


        $product->save();
        return redirect('/admin/products/show')->with('success', 'Товар успешно добавлен');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return view('admin.products.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Products::find($id);

        return view('admin.products.show-product', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public static function getNameProduct($id){


        $product=DB::table('products')->where('id', $id)->first();


        $name=$product->title;


        return $name;

    }

    public static function getSkuProduct($id){


        $product=DB::table('products')->where('id', $id)->first();


        $sku=$product->sku;


        return $sku;

    }
}

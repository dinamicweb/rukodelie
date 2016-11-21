<?php

namespace App\Http\Controllers\Admin;

use App\Models\UnitsVariants;
use App\Models\Variants;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class VariantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        Добавляем вариант
        $variant = new Variants();
        $variant->products_id = $request->products_id;

        if (empty($request->color_id)) {
            $variant->color_id = 0;
        } else {
            $variant->color_id = $request->color_id;
        }
        $variant->save();

        return redirect('/admin/products/show');


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        return view('admin.variants.store', ['id' => $id]);
    }

    public function storeUnits($id)
    {
        return view('admin.variants.store-unit-variant', ['id' => $id]);
    }

    public function createUnit(Request $request)
    {

        $unitVariant = new UnitsVariants();

        $unitVariant->product_id = $request->product_id;
        $unitVariant->units_id = $request->units_id_one;
        $unitVariant->price = $request->price;
        $unitVariant->compare_price = $request->compare_price;
        $unitVariant->stock = $request->stock;
        $unitVariant->heft = $request->heft;
        $unitVariant->count_unit = $request->count_unit;
        $unitVariant->save();

        return redirect('/admin/products/show');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $variants = DB::table('variants')->where('products_id', $id)->get();

        return view('admin.variants.show-product-variants', ['variants' => $variants, 'product_id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

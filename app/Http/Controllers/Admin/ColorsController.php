<?php

namespace App\Http\Controllers\Admin;

use App\Models\Colors;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            $colors=new Colors();

            $colors->title_colors=$request->title_colors;

            $colors->save();
            return redirect('/admin/colors')->with('success', $colors->title_name . ' цвет успешно добавлен');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return view('admin.colors.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $colors=Colors::all();
        return view('admin.colors.show', ['colors'=>$colors]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color=Colors::find($id);

        return view('admin.colors.edit', ['color'=>$color]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $color=Colors::find($request->id);

        $color->title_colors=$request->name;

        $color->save();

        return redirect('/admin/colors')->with('success', $color->title_name . ' цвет успешно обновлен');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color=Colors::find($id);
        $color->delete();
        return redirect('/admin/colors')->with('success', $color->title_name . ' цвет успешно удален');

    }
}

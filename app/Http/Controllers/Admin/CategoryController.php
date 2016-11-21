<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RedisHelper;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Image;
use Storage;

class CategoryController extends Controller
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

        $category = new Category();


        $category->name = $request->name;

        $category->url = TranslitController::str2url($request->name);

        if ($this->checkUrlCategory($category->url) == true) {


        } else {

            $category->url = TranslitController::str2url($request->name).'-'.time();
        }


        $category->title_meta = $request->title_meta;
        $category->description_meta = $request->description_meta;
        $category->keywords_meta = $request->keywords_meta;

//        Загрузка файла
        if (empty($request->file('file'))) {

            $category->img = 'nophoto.png';

        } else {

            $file = $request->file('file');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = TranslitController::str2url($filename);
            $filename = $filename . '-' . time() . '.' . $extension;
            $category->img = $filename;
            $request->file('file')->move('upload/category/originals', $filename);




        }
        $category->parent_id = $request->parent_id;
        $category->display = 1;

        $category->save();

        $cashed = new RedisHelper();

        $cashed->AddCashedCategory();

        return redirect('/admin/category')->with('success', 'Категория успешно добавлена');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return view('admin.category.store');
    }

//    Проверка существования url категории
    static function checkUrlCategory($url)
    {

        $category = DB::table('category')->where('url', $url)->get();

        if (empty($category)) {

            return true;
        } else {


            return false;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $category = Category::all();
        return view('admin.category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category = Category::find($request->id);

        $old_name_category = $category['original']['name'];

        $category->name = $request->name;
        if ($request->name == $old_name_category) {

        } else {
            $category->url = TranslitController::str2url($request->name);
            if ($this->checkUrlCategory($category->url) == true) {

            } else {
                return redirect()->back()->with('error', 'Категория с таким url уже существует')->withInput();
            }
        }
        $category->title_meta = $request->title_meta;
        $category->description_meta = $request->description_meta;
        $category->keywords_meta = $request->keywords_meta;
//        Загрузка файла
        $file = $request->file('file');
        if (!isset($file)) {

        } else {
            $file = $request->file('file');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = TranslitController::str2url($filename);
            $filename = $filename . '-' . time() . '.' . $extension;
            $category->img = $filename;
            $request->file('file')->move('upload/category/originals', $filename);
        }
        $category->parent_id = $request->parent_id;
        $category->display = 1;
        $category->save();
        $cashed = new RedisHelper();
        $cashed->AddCashedCategory();
        return redirect('/admin/category')->with('success', 'Категория успешно обновлена');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        $cashed = new RedisHelper();

        $cashed->AddCashedCategory();

        return redirect('/admin/category')->with('success', 'Категория ' . $category->name . ' успешно удалена');
    }
}

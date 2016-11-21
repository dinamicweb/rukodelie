<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Главная страница
Route::get('/', 'MainController@index');
Route::get('/successful-registration', 'MainController@SuccessfulRegistration'); //Страница успешной регистрации
Route::get('/catalog/{category}', 'CatalogController@index'); //Страница успешной регистрации
Route::get('/products', 'CatalogController@products');
Route::get('/product/{url}', 'CatalogController@product');


//Страницы
Route::get('/contact', 'MainController@contact');
Route::get('/reviews', 'ReviewsController@index');
Route::get('/cart', 'CartController@cart');


//Отзывы


////Для пробы
//Route::get('/redis', 'MainController@redis');
//
//Route::get('/mongo', function(){
//    $mongo=new \App\Models\Mongo();
//    $mongo->name='mama';
//    $mongo->save();
//});

//Товары
//Смена ед.изм


Route::post('/products/change/units', 'CatalogController@ChangeUnitsProducts');

//Корзина

//Добавление и обновление колличества  товара в корзине
Route::post('/cart/add', 'CartController@addProductCart');
Route::post('/cart/update', 'CartController@UpdateProductCart');



Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/editor', 'HomeController@editor');




//Админка
//
Route::group(['middleware' => 'admin'], function()
{

    Route::get('/admin', 'Admin\HomeController@index');
    Route::get('/admin/news', 'Admin\HomeController@news');
    Route::get('/admin/actions', 'Admin\HomeController@actions');

//    Категории магазина CRUD routes

    Route::get('/admin/category', 'Admin\CategoryController@show');
    Route::get('/admin/category/store', 'Admin\CategoryController@store');
    Route::post('/admin/category/create', 'Admin\CategoryController@create');
    Route::get('/admin/category/edit/{id}', 'Admin\CategoryController@edit');
    Route::post('/admin/category/update', 'Admin\CategoryController@update');
    Route::get('/admin/category/destroy/{id}', 'Admin\CategoryController@destroy');

//   Справочник ед. измерения
    Route::get('/admin/units', 'Admin\UnitsController@show');
    Route::get('/admin/units/store', 'Admin\UnitsController@store');
    Route::post('/admin/units/create', 'Admin\UnitsController@create');
    Route::get('/admin/units/edit/{id}', 'Admin\UnitsController@edit');
    Route::post('/admin/units/update', 'Admin\UnitsController@update');
    Route::get('/admin/units/destroy/{id}', 'Admin\UnitsController@destroy');


    //   Товары
    Route::get('/admin/products/show', 'Admin\ProductsController@index');
    Route::get('/admin/products/show/{id}', 'Admin\ProductsController@show');
    Route::get('/admin/products/store', 'Admin\ProductsController@store');
    Route::post('/admin/products/create', 'Admin\ProductsController@create');
    Route::get('/admin/products/edit/{id}', 'Admin\ProductsController@edit');
    Route::post('/admin/products/update', 'Admin\ProductsController@update');
    Route::get('/admin/products/destroy/{id}', 'Admin\ProductsController@destroy');



//    Варианты товара
    Route::get('/admin/products/{id}/variants/store', 'Admin\VariantsController@store');
    Route::post('/admin/variants/create', 'Admin\VariantsController@create');
    Route::post('/admin/variants/unit/create', 'Admin\VariantsController@createUnit');
    Route::get('/admin/product/{id}/variants/all', 'Admin\VariantsController@show');
    Route::get('/admin/variant/{id}/units/store', 'Admin\VariantsController@storeUnits');



//    Справочник цветов
    Route::get('/admin/colors', 'Admin\ColorsController@show');
    Route::get('/admin/colors/store', 'Admin\ColorsController@store');
    Route::post('/admin/colors/create', 'Admin\ColorsController@create');
    Route::get('/admin/colors/edit/{id}', 'Admin\ColorsController@edit');
    Route::post('/admin/colors/update', 'Admin\ColorsController@update');
    Route::get('/admin/colors/destroy/{id}', 'Admin\ColorsController@destroy');

});
@extends('layouts.app')

@section('header')

    <link rel="stylesheet" href="/includes/admin/choosen/chosen.css">
    @stop

@section('content')

    <div class="container">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Добавить товар</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @if (Session::has('error'))

                                <div class="alert alert-error alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{Session::get('error')}}</strong>
                                </div>

                            @endif

                            <form id="demo-form2" enctype="multipart/form-data"  method="POST" action="/admin/products/create" class="form-horizontal form-label-left">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Наименование товара <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="name" required="required" name="name" value="{{old('name')}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_url_category">Артикул товара<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="position" required="required" name="sku" value="{{old('sku')}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_url_category">Вес товара (в граммах)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="position" required="required" name="heft" value="{{old('heft')}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_url_category">Новинка<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="checkbox" style="width: 30px; height: 30px;" id="position"  name="new" value="1" class="col-xs-2">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_url_category">Описание товара<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="description" id="editor1" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">Категория товара: <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="category_id" id="category" class="form-control">
                                            <option value="0">Выбирете категорию</option>
                                            {!! \App\Helpers\CategoryHelpers::getCategoryList() !!}
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">Фото товара</label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="tema" class="form-control col-md-7 col-xs-12" type="file" name="file">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="/admin/category" class="btn btn-primary">Отмена</a>
                                        <button type="submit" class="btn btn-success">Создать товар</button>
                                    </div>
                                </div>

                            </form>



                        </div>
                    </div>
                </div>
            </div>

    </div>




    @stop


@section('footer')
    <script src="/includes/admin/choosen/chosen.jquery.js"></script>
    <script src="/js/ckeditor/ckeditor.js"  type="text/javascript" charset="utf-8" ></script>


    <script>
        var editor = CKEDITOR.replace( 'editor1',{
            filebrowserBrowseUrl : '/elfinder/ckeditor'
        } );
    </script>
    <script>

        $("#category").chosen();
    </script>

    @stop
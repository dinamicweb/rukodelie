@extends('layouts.app')

@section('header')


    @stop

@section('content')

    <div class="container">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Добавить категорию</h2>
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

                            <form id="demo-form2" enctype="multipart/form-data"  method="POST" action="/admin/category/create" class="form-horizontal form-label-left">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Наименование категории <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="name" required="required" name="name" value="{{old('name')}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_url_category">Заголовок страницы категории<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="position" required="required" name="title_meta" value="{{old('title_meta')}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_url_category">Ключевые слова категории<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="position" required="required" name="keywords_meta" value="{{old('keywords_meta')}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_url_category">Описание категории<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="position" required="required" name="description_meta" value="{{old('description_meta')}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">Категория родитель: <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="parent_id" class="form-control">
                                            <option value="0">Выбирете категорию</option>
                                            {!! \App\Helpers\CategoryHelpers::getParentCategory() !!}
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">Фото категории</label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="tema" class="form-control col-md-7 col-xs-12" type="file" name="file">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="/admin/category" class="btn btn-primary">Отмена</a>
                                        <button type="submit" class="btn btn-success">Создать категорию</button>
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


    @stop
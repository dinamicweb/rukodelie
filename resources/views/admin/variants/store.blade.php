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
                        <h2>Добавить цвет товара</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if (Session::has('error'))

                            <div class="alert alert-error alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span>
                                </button>
                                <strong>{{Session::get('error')}}</strong>
                            </div>

                        @endif

                        <form id="demo-form2" enctype="multipart/form-data" method="POST"
                              action="/admin/variants/create" class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="products_id" value="{{ $id }}">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Цвет товара
                                    <span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="color_id" id="category" class="form-control">
                                        <option value="0">Выбирете цвет</option>
                                        {!! \App\Helpers\ColorsHelper::colorsGetList() !!}
                                    </select>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/admin/products/show" class="btn btn-primary">Отмена</a>
                                    <button type="submit" class="btn btn-success">Добавить  цвет  товара</button>
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
    <script src="/js/ckeditor/ckeditor.js" type="text/javascript" charset="utf-8"></script>


    <script>
        var editor = CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: '/elfinder/ckeditor'
        });
    </script>
    <script>

        $("#category").chosen();
        $("#ed_opt").chosen();
    </script>

@stop
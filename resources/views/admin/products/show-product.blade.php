@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Товар ->
                        {{\App\Http\Controllers\Admin\ProductsController::getNameProduct($product->id)}}
                    </div>
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                            </button>
                            <strong>{{session()->get('success')}}</strong>
                        </div>
                    @endif
                    <div class="panel-body">

                        <a href="/admin/product/{{$product->id}}/variants/all">Посмотреть варианты товара</a>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Свойство товара</th>
                                <th>Значение</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    Изображение
                                </td>
                                <td>
                                    <img style="width: 50px; height: 50px;" src="/upload/products/{{$product->img}}"
                                         alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Наименование
                                </td>
                                <td>
                                    {{$product->title}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Артикул
                                </td>
                                <td>
                                    {{$product->sku}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Категория
                                </td>
                                <td>
                                    {{\App\Helpers\CategoryHelpers::getParentCategoryName($product->category_id)}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Вес
                                </td>
                                <td>
                                    {{$product->heft}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Описание
                                </td>
                                <td>
                                    {!! $product->description !!}
                                </td>
                            </tr>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('header')

    <link href="/includes/admin/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

@stop
@section('footer')
    <script src="/includes/admin/js/datatables/jquery.dataTables.min.js"></script>
    <script>

        $('#datatable-responsive').DataTable({

            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Russian.json"
            }
        });
    </script>
@stop
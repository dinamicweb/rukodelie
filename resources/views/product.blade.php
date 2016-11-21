@extends('app_catalog')


@section('header')

    <link rel="stylesheet" type="text/css" href="/css/easydropdown.metro.tovar.css">

@stop

@section('content')

    <p class="tovar_tov"><span class="tovar_cat"><a href="#">Главная</a>/ <a href="#">Лента</a>/ <a href="#">Лента
                атласная</a>/ <a href="#">Однотонная</a>/ <a href="#">25мм</a>/ </span>Розовая</p>

    <div class="tovar_zzz">
        <img class="tovar_tov_img" src="/upload/products/{{$product->img}}">

        <div class="tovar_inform">
            <div class="tovar_na">
                <p>{{$product->title}}</p>

                <p>цвет розовый?</p>
            </div>
            <div class="tovar_art">
                <p>Артикул:</p>

                <p>{{$product->sku}}</p>
            </div>
            <div class="tovar_opi">
                <p>Описание:</p>
                {!! $product->description !!}
            </div>
            <form action="#" method="">
                @if(count($product->variants)==1)
                    @if($product->variants[0]->color_id==0)

                    @else
                        <select name="color" class="dropdown" data-settings='{"wrapperClass":"metro"}'>
                            <option class="label" value="0">Цвет</option>
                            <option value="{{$product->variants[0]->color_id}}">{{\App\Helpers\ColorsHelper::getNameColor($product->variants[0]->color_id)}}</option>

                        </select>
                    @endif
                @else

                    <select name="color" class="dropdown" data-settings='{"wrapperClass":"metro"}'>
                        <option class="label" value="0">Цвет</option>
                        @foreach($product->variants as $v)
                            <option value="{{$v->color_id}}">{{\App\Helpers\ColorsHelper::getNameColor($v->color_id)}}</option>
                        @endforeach
                    </select>

                @endif

                @if(count($product->variants[0]->units)==1)
                    <select name="eval" class="dropdown" data-settings='{"wrapperClass":"metro"}'>
                        <option class="label" value="0">Единица измерения</option>
                        <option class="label"
                                value="{{$product->variants[0]->units[0]->units_id}}">{{\App\Helpers\UnitsHelper::getNameUnits($product->variants[0]->units[0]->units_id)}}</option>


                    </select>
                @else
                    <select name="eval" class="dropdown" data-settings='{"wrapperClass":"metro"}'>
                        <option class="label" value="0">Единица измерения</option>
                        @foreach($product->variants[0]->units as $u)
                            <option class="label"
                                    value="{{$u->units_id}}">{{\App\Helpers\UnitsHelper::getNameUnits($u->units_id)}}</option>
                        @endforeach
                    </select>
                @endif

                <p class="tovar_price">Цена 150 рублей</p>

                <div class="tovar_tocell">

                    <input type="submit" class="tovar_men tovar_no" value="Добавить в корзину">
                    <span class="tovar_mi">-</span>

                    <div class="tovar_num"><input class="tovar_val" type="number" value="0" min="0" max="99"></div>
                    <span class="tovar_pl">+</span>

                </div>
            </form>
            <p class="tovar_ava">В наличии 10 шт.</p>
        </div>
    </div>



@stop


@section('footer')
    <script type="text/javascript" src="/js/jquery.easydropdown.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $(".tovar_pl").click(function () {
                if (Number($(".tovar_val").val()) < 99) {
                    var value = Number($(".tovar_val").val()) + 1;
                    $(".tovar_val").val(value);
                }
            })

            $(".tovar_mi").click(function () {
                if (Number($(".tovar_val").val()) > 0) {
                    var value = Number($(".tovar_val").val()) - 1;
                    $(".tovar_val").val(value);
                }
            })


        });
    </script>

    <script>


    </script>



@stop
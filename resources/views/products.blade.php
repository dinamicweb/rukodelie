@extends('app_catalog')

@section('header')

    <link rel="stylesheet" type="text/css" href="/css/easydropdown.css">
    <link rel="stylesheet" type="text/css" href="/css/easydropdown.metro.css">

@stop
@section('content')

    <p class="category_1_tov"><span class="category_1_cat"><a href="#">Главная</a>/ <a href="#">Лента</a>/ <a href="#">Лента
                атласная</a>/ <a href="#">Однотонная</a>/ </span>10 мм</p>
    <div class="category_1_brd"></div>
    <form action="">

        <select class="dropdown" name="mix_show">
            <option value="" class="label">Показывать на странице</option>
            <option value="1"></option>
        </select>

        <select class="dropdown" name="price_mix">
            <option value="" class="label">Сортировка по цене</option>
            <option value="1"></option>
        </select>

        <select class="dropdown" name="price_alf">
            <option value="" class="label">Сортировка по алфавиту</option>
            <option value="1"></option>
        </select>

    </form>
    <div class="category_1_brd"></div>
    <div class="category_1_zzz">


        {{--<div class="category_1_tov_cell">--}}
        {{--<div class="new_fuuuuu">Новинка</div>--}}
        {{--<p class="category_1_nam">Бусина стеклянная</p>--}}
        {{--<div class="category_1_cell_lin"></div>--}}


        {{--<p class="sale_cell_price">150 рублей</p>--}}
        {{--<p class="sale_new_price">50 рублей</p>--}}

        {{--<div class="category_1_effect">--}}
        {{--<a class="category_1_more_a" href="#"><img class="category_1_cell_png" src="images/eye.png"><p class="category_1_more_p"><i>Подробнее</i></p></a>--}}
        {{--<img class="category_1_img_cell" src="images/category/len.jpg">--}}
        {{--</div>--}}
        {{--<div class="category_1_more">--}}

        {{--<select name="color" class="dropdown" data-settings='{"wrapperClass":"metro"}'>--}}
        {{--<option class="label" value="">Цвет</option>--}}
        {{--<option value="1">Синий</option>--}}
        {{--<option value="2">Зелёный</option>--}}
        {{--</select>--}}

        {{--<select name="eval" class="dropdown" data-settings='{"wrapperClass":"metro"}'>--}}
        {{--<option selected value="1" >Метры</option>--}}
        {{--<option value="2">Бобины</option>--}}
        {{--</select>--}}

        {{--</div>--}}

        {{--<div class="category_1_to_cell">--}}
        {{--<input class="category_1_in_to_cell" name="in_to_cell" value="Добавить в корзину" type="button">--}}
        {{--<div class="category_1_num_to_cell">--}}
        {{--<div id="minu_1" data-id="1" class="category_1_minpl category_1_mi">-</div>--}}
        {{--<input id="vl_1" data-id="1" class="category_1_to_cell_val" min="0" max="99" value="0" type="number">--}}
        {{--<div id="plu_1" data-id="1" class="category_1_minpl category_1_plu">+</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}



        @foreach($products as $p)

            <div data-product-id="{{$p->id}}" class="category_1_tov_cell">
                <p class="category_1_nam">{{$p->title}}</p>

                <form action="" method="POST" class="cart-add">
                    <div class="category_1_cell_lin"></div>
                    @if(count($p->units)==1)
                        <p class="category_1_cell_price">{{$p->units[0]->price}} рублей</p>
                        <input type="hidden" id="price" name="price" value="{{$p->units[0]->price}}">
                        <input type="hidden" id="compare_price" name="compare_price"
                               value="{{$p->units[0]->compare_price}}">
                    @else
                        <p class="category_1_cell_price"> {{\App\Helpers\UnitsHelper::getMinUnitsPrice($p->units)}}
                            рублей</p>
                        <input type="hidden" id="price" name="price"
                               value=" {{\App\Helpers\UnitsHelper::getMinUnitsPrice($p->units)}}">
                        <input type="hidden" id="compare_price" name="compare_price"
                               value=" {{\App\Helpers\UnitsHelper::getMinUnitsComparePrice($p->units)}}">
                    @endif
                    <div class="category_1_effect">
                        <a class="category_1_more_a" href="/product/{{$p->url}}"><img class="category_1_cell_png"
                                                                                      src="/images/eye.png">

                            <p class="category_1_more_p"><i>Подробнее</i></p></a>
                        <img class="category_1_img_cell" src="/upload/products/{{$p->img}}">
                    </div>

                    <input type="hidden" id="prod_id" name="product_id" value="{{$p->id}}">
                    @if((count($p->colors)==0) && (count($p->units)==1))
                        <input type="hidden" name="units" value="{{$p->units[0]->units_id}}">
                        <input type="hidden" name="price" value="{{$p->units[0]->price}}">
                        <input type="hidden" name="compare_price" value="{{$p->units[0]->compare_price}}">

                    @else

                        <div class="category_1_more">
                            @if(count($p->colors)==0)

                            @else
                                <select name="colors_list" class="dropdown" data-settings='{"wrapperClass":"metro"}'>
                                    <option selected class="label" value="0">Цвет</option>
                                    @foreach($p->colors as $color)
                                        <option value="{{$color->color_id}}">
                                            {{\App\Helpers\ColorsHelper::getNameColor($color->color_id)}}
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                            @if(count($p->units)==1)
                                <input type="hidden" name="units" value="{{$p->units[0]->units_id}}">
                            @else
                                {{--<select name="units_list" class="dropdown units_select"--}}
                                {{--data-settings='{"wrapperClass":"metro"}'>--}}
                                {{--<option selected class="label" value="0">Единица измерения</option>--}}
                                {{--<option value="{{$p->units[0]->units_id}}">--}}
                                {{--{{\App\Helpers\UnitsHelper::getNameUnits($p->units[0]->units_id)}}--}}
                                {{--</option>--}}
                                {{--<option value="{{$p->units[1]->units_id}}">--}}
                                {{--{{\App\Helpers\UnitsHelper::getNameUnits($p->units[1]->units_id)}}--}}
                                {{--</option>--}}
                                {{--</select>--}}
                                <div class="tovar_radio">
                                    <div class="buy">
                                        <input class="tovar_met tovar_radi" id="met" type="radio" name="units_list" value="{{$p->units[0]->units_id}}">
                                        <label for="met" class="tovar_rad">{{\App\Helpers\UnitsHelper::getNameUnits($p->units[0]->units_id)}}</label>
                                    </div>
                                    <div class="tovar_buy">
                                        <input class="tovar_bab tovar_radi" id="bab" type="radio" name="units_list" value="{{$p->units[1]->units_id}}">
                                        <label for="bab" class="tovar_rad">{{\App\Helpers\UnitsHelper::getNameUnits($p->units[1]->units_id)}}</label>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                    <div class="category_1_to_cell">
                        <input class="category_1_in_to_cell" data-product-ids="{{$p->id}}" name="in_to_cell"
                               value="Добавить в корзину" type="submit">

                        <div class="category_1_num_to_cell">
                            <div id="minu_{{$p->id}}" data-id="{{$p->id}}" class="category_1_minpl category_1_mi">-
                            </div>
                            <input id="vl_{{$p->id}}" data-id="{{$p->id}}" name="count_products"
                                   class="category_1_to_cell_val" min="0" max="99" value="0"
                                   type="number">

                            <div id="plu_{{$p->id}}" data-id="{{$p->id}}" class="category_1_minpl category_1_plu">+
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        @endforeach

    </div>


@stop

@section('footer')

    <script type="text/javascript" src="/js/jquery.easydropdown.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {


            $(".category_1_plu").click(function () {
                var id = $(this).data("id");
                if (Number($('#vl_' + id).val()) < 99) {
                    var value = Number($("#vl_" + id).val()) + 1;
                    $("#vl_" + id).val(value);
                }
            })

            $(".category_1_mi").click(function () {
                var id = $(this).data("id");
                if (Number($("#vl_" + id).val()) > 0) {
                    var value = Number($("#vl_" + id).val()) - 1;
                    $("#vl_" + id).val(value);
                }
            })


        });
    </script>

    <script>
        {{--Добавление товара в корзину--}}
        $(".cart-add").submit(function () {
            var products = $(this).serialize();


            $.post('/cart/add', products, function (data) {




            });
            return false;
        });


        //       Изменение ед. изм. (выводится новая цена)

        $(".tovar_radi").click(function () {

            var params = {};
            params.units = $('input[name=units_list]:checked').val();;
            console.log(params);

            params.product_id = $("#prod_id").val();

            $.post('/products/change/units', params, function (data) {
                if (data.success == 0) {
                    console.log(data.error);
                } else {
                    console.log(data);
                    $('[data-product-id=' + data.product.product_id + ']').find('.category_1_cell_price').text(data.product.price + ' рублей');
                    $('#price').val(data.product.price);
                    $('#compare_price').val(data.product.compare_price);
                }

            });



        });

    </script>
@stop


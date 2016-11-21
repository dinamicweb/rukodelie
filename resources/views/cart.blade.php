@extends('app_page')



@section('content')

    <div class="cell_center">
        <p class="cell_catalog">Корзина</p>

        <div class="cell_li"></div>

        <div class="cell_article">
            @if(empty($cart))

                Нет товаров
            @else

                <div class="cell_table_head">
                    <div class="cell_head_1">
                        <p class="cell_tovar_val tovar_ident">Товар</p>
                    </div>
                    <div class="cell_head_2">
                        <p class="cell_tovar_val tovar_value">Количество</p>
                    </div>
                    <div class="cell_head_3">
                        <p class="cell_tovar_val tovar_izm">Ед. изм.</p>
                    </div>
                    <div class="cell_head_4">
                        <p class="cell_tovar_val tovar_price">Цена</p>
                    </div>
                    <div class="cell_head_5">
                        <p class="cell_tovar_val tovar_cash">Сумма</p>
                    </div>
                </div>
                @for($i=0; $i<count($cart['products']); $i++)


                    <div id="tovar_{{$i}}" class="cell_tovar">

                        <div class="cell_body_1">
                            <input type="hidden" id="product_id_{{$i}}" name="product_id"
                                   value="{{$cart['products'][$i]['product_id']}}">
                            <input type="hidden" id="units_id_{{$i}}" name="units_id"
                                   value="{{$cart['products'][$i]['units_id']}}">
                            <input type="hidden" id="colors_id_{{$i}}" name="colors_id"
                                   value="{{$cart['products'][$i]['colors_id']}}">

                            <div id="tov_img_1" class="cell_tov_img ">
                                <img style=" width: 100%; height: 100%;"
                                     src="/upload/products/{{\App\Helpers\ProductHelpers::getImgProduct($cart['products'][$i]['product_id'])}}">
                            </div>
                            <label for="tov_img_1"
                                   class="cell_tov_name">{{\App\Helpers\ProductHelpers::getNameProduct($cart['products'][$i]['product_id'])}}
                                (цвет: @if($cart['products'][$i]['colors_id']==0) Нет
                                цвета @else {{\App\Helpers\ColorsHelper::getNameColor($cart['products'][$i]['colors_id'])}} @endif </label>
                        </div>

                        <div class="cell_body_2">
                            <div class="cell_num">
                                <p id="mi_{{$i}}" data-id="{{$i}}" class="cell_plmin cell_mi"></p>

                                <div id="sht_{{$i}}" class="cell_sht">
                                    <input id="val_{{$i}}" data-id="{{$i}}" class="cell_val"
                                           value="{{$cart['products'][$i]['count_product']}}" min="1"
                                           max="{{\App\Http\Controllers\CartController::getStockProduct($cart['products'][$i]['product_id'], $cart['products'][$i]['colors_id'], $cart['products'][$i]['units_id'])}}"
                                           type="number" onchange="mon(this.getAttribute('data-id'))">
                                </div>
                                <p id="pl_{{$i}}" data-id="{{$i}}" class="cell_plmin cell_pl"></p>
                            </div>
                        </div>

                        <div class="cell_body_3">
                            <p class="cell_tov_izm">{{\App\Helpers\UnitsHelper::getNameAbbUnits($cart['products'][$i]['units_id'])}}
                                .</p>
                        </div>

                        <div class="cell_body_4">
                            <p class="cell_tov_pr_val">{{$cart['products'][$i]['price']}} рублей</p>
                        </div>

                        <div class="cell_body_5">
                            <p id="tov_cash_val_{{$i}}"
                               class="cell_tov_cash_val">{{$cart['products'][$i]['total_product_price']}} рублей</p>

                            <div data-id="{{$i}}" class="cell_del"></div>
                        </div>
                    </div>
                @endfor

                <div class="cell_bu">
                    @if(empty($cart['discont']['messages']))

                    @else
                        <div class="diskount">
                            <p class="diskount_p">{{$cart['discont']['messages']}}</p>
                        </div>
                    @endif
                    <p id="cell_price" class="cell_money cell_summ @if($cart['discont']['total_price_discont']==$cart['total_price_cart']) @else stroke @endif">
                        Итого {{$cart['total_price_cart']}} рублей</p>


                    <div class="cell_div_summ">
                        @if($cart['discont']['total_price_discont']==$cart['total_price_cart'])
                            <p style="display: none;" id="cell_summ" class="cell_money cell_summ">{!! $cart['discont']['message'] !!}</p>
                            @else
                        <p id="cell_summ" class="cell_money cell_summ">{!! $cart['discont']['message'] !!}</p>

                         @endif
                    </div>
                    <input class="cell_cash" value="Оформить заказ" type="button"></div>
            @endif
        </div>

    </div>



@stop

@section('footer')



    <script type="text/javascript">

        var count_focus;

        $(".cell_val").focus(function () {


            count_focus = $(this).val();

        });


        function mon(id) {

//
            if (Number($('#val_' + id).val()) === 0) {

                alert('нет 0');
                $("#val_" + id).val(count_focus);


            } else if (Number($('#val_' + id).val()) >= $('#val_' + id).attr('max')) {

                $("#val_" + id).val(count_focus);

            } else {

                var value = Number($("#val_" + id).val());
                $("#val_" + id).val(value);

                updateCount(id);
            }
        }


        $(document).on('input', '.cell_val', function (e) {
            this.value = this.value.replace(/[^\d.]+|(\.\d{2})\d*$/g, '$1').replace(/\d(?=(?:\d{3})+(?!\d))/g, "$& "); // Чистим и форматируем

        });

        $('.cell_val').keydown(function (e) {
            if (e.keyCode === 191) {
                e.preventDefault();             // Нельзя вводить точку дважды
                return;
            } else if (e.keyCode === 190) {
                e.preventDefault();             // Нельзя вводить точку дважды
                return;

            } else if (e.keyCode === 110) {
                e.preventDefault();             // Нельзя вводить точку дважды
                return;

            }
//            alert(e.keyCode);
        });

        $(".cell_pl").click(function () {

            var id = $(this).data("id");


            if (Number($('#val_' + id).val()) === 0) {


                $("#val_" + id).val() + 1;


            } else if (Number($('#val_' + id).val()) >= $('#val_' + id).attr('max')) {

                $("#val_" + id).val() - 1;

            } else {

                var value = Number($("#val_" + id).val()) + 1;
                $("#val_" + id).val(value);

                updateCount(id);
            }


        });

        $(".cell_mi").click(function () {
            var id = $(this).data("id");
            if (Number($('#val_' + id).val()) === 1) {


                $("#val_" + id).val() + 1;

                alert('Вы не можете купить 0 товаров');

            } else if (Number($('#val_' + id).val()) >= $('#val_' + id).attr('max')) {
                var value = Number($("#val_" + id).val()) - 1;
                $("#val_" + id).val(value);

            } else {

                var value = Number($("#val_" + id).val()) - 1;
                $("#val_" + id).val(value);

                updateCount(id);
            }
        });


        $(".cell_del").click(function () {

            var id = $(this).data('id');

            alert(id);

        });

        function updateCount(id) {

            var params = {};

            params.product_id = $("#product_id_" + id).val();
            params.units_id = $("#units_id_" + id).val();
            params.colors_id = $("#colors_id_" + id).val();
            params.count_product = $("#val_" + id).val();

            console.log(JSON.stringify(params));
//Обновление колличества товаров в корзине
            $.post('/cart/update', params, function (data) {
                if (data.success == 0) {
                    console.log(data.error);
                } else {
                    console.log(data);
                    updateContextCart(data.cart.products);
                    $("#cell_price").text('Итого '+ data.cart.total_price_cart +' рублей');
                    $("#cell_summ").html(data.cart.discont.message);

                    $(".diskount_p").html(data.cart.discont.messages);
                    $("#basket_diskount_p").html(data.cart.discont.messages_basket);

                    if(data.cart.total_price_cart>data.cart.discont.total_price_discont){
                        $('#basket_index_cells').html(data.cart.discont.total_price_discont +' руб.')
                        var title=declOfNum(data.cart.count_products,['товар','товара','товаров'])

                        $('#tovar_in_cells').html(data.cart.count_products +' '+title)
                        $("#cell_price").addClass('stroke');

                    }else{
                        $('#basket_index_cells').html(data.cart.total_price_cart +' руб.')

                        var title=declOfNum(data.cart.count_products,['товар','товара','товаров'])
                        $('#tovar_in_cells').html(data.cart.count_products +' '+title)
                        $("#cell_price").removeClass('stroke');
                    }


                    if(data.cart.total_price_cart==data.cart.discont.total_price_discont){
                        $("#cell_summ").css("display", "none");
                    }else{
                        $("#cell_summ").css("display", "block");
                    }

                    if(data.cart.discont.messages===''){
                        $(".diskount_p").css("display", "none");
                        $(".diskount").css("display", "none");

                    }else{
                        $(".diskount_p").css("display", "block");
                        $(".diskount").css("display", "inline-block");
                    }
                }

            });
        }

        function declOfNum(number, titles)
        {
            cases = [2, 0, 1, 1, 1, 2];
            return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];
        }

        function updateContextCart(data) {
            var i;
            for (i = 0; i < data.length; i++) {

                $("#tov_cash_val_" + i).html(data[i].total_product_price + ' рублей');

            }
//                console.log(data.length);
        }
    </script>

@stop
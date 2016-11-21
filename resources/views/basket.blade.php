<div class="index_basket">
    <div class="index_kor"></div>
    @if(Session::has('cart'))


        @if(Session::get('cart.total_price_cart')>Session::get('cart.discont.total_price_discont'))
            <a id="basket_index_cells" class="index_cells" href="#">{{Session::get('cart.discont.total_price_discont')}} руб</a>
        @else
            <a id="basket_index_cells" class="index_cells" href="#">{{Session::get('cart.total_price_cart')}} руб</a>
        @endif
        <p id="tovar_in_cells" class="index_cells tovar_in_cells">{{Session::get('cart.count_products')}} товар</p>

        @else
                <!-- <a class="index_cells" href="#">Корзина</a> -->
    @endif
</div>
@if(Session::get('cart.discont.messages_basket')=='')
    <div style="display: none" class="diskount">
        <p id="basket_diskount_p" class="diskount_p">{!! Session::get('cart.discont.messages_basket')!!}</p>
    </div>

@else
    <div class="diskount">
        <p id="basket_diskount_p" class="diskount_p">{!! Session::get('cart.discont.messages_basket') !!}</p>
    </div>
@endif

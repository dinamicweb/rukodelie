<?php
namespace App\Helpers;

use DB;

class NavTopHelper
{

    public static function navTop()
    {

        $nav = '';
        $nav .= '<li><a href="/" class="men">Главная</a></li>';
        $nav .= '<li><a href="/about" class="men">О нас</a></li>';
        $nav .= '<li><a href="oplata.html" class="men">Оплата и доставка</a></li>
        <li><a href="/catalog/sale" class="men">Распродажа</a></li>
        <li><a href="catalog/new" class="men">Новинки</a></li>
        <li><a href="/reviewes" class="men">Отзывы</a></li>
        <li><a href="/contact" class="men">Контакты</a></li>';

        return $nav;
    }


    

}
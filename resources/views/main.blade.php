@extends('app')


@section('content')

    <p class="index_catalog">Каталог товаров</p>
    <div class="index_li"></div>

    <div class="index_article">

       @foreach($category as $c)
        <div class="index_cell">
            <a href="/catalog/{{$c->url}}">
                <img src="/upload/category/originals/{{$c->img}}">
                <div class="index_name">
                    <p>{{$c->name}}</p>
                </div>
            </a>
        </div>
    @endforeach


    </div>



    @stop
@extends('app_catalog')


@section('content')

    <p class="category_tov"><span class="category_cat"><a href="#">Главная</a>/ </span>Бусины, полубусины</p>
    <div class="category_li"></div>

    @foreach($category as $c)
        <div class="category_cell">
            <a href="/catalog/{{$c->url}}">
                <img src="/upload/category/originals/{{$c->img}}">

                <div class="category_name">
                    <p>{{$c->name}}</p>
                </div>
            </a>
        </div>
    @endforeach

@stop
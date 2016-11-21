@extends('app_page')

@section('header')



    @stop

@section('footer')



    @stop


@section('content')


    <div class="messages_center">
        <p class="messages_catalog">Отзывы</p>
        <div class="messages_li"></div>

        <div class="messages_article">

            <div class="messages_box">
                <p class="messages_quest">Оставить отзыв</p>
                <form action="">
                    <input class="messages_name messages_mail" placeholder="Имя" type="text">
                    <textarea class="messages_message messages_mail" placeholder="Сообщение"></textarea>
                    <label id="label" class="messages_label" value="" for="comm_img">Загрузить фотографию<input id="comm_img" class="messages_mess_img" name="comm_img" accept="image/*" type="file"></label>
                    <div class="messages_captcha">{!! app('captcha')->display() !!}</div>
                    <div class="messages_second">
                        <input class="messages_men messages_po" value="Отправить" class="messages_reg" type="submit">
                    </div>
                </form>
            </div>
            <div class="messages_white_box">
                <p class="messages_name_small">Имя</p>
                <p class="messages_date_small">01.01.2001</p>
                <p class="messages_mess_small">Текст</p>

                <img class="messages_img_small" src="images/comm_image.png">
            </div>
            <div class="messages_white_box">
                <p class="messages_name_small">Имя</p>
                <p class="messages_date_small">01.01.2001</p>
                <p class="messages_mess_small">Текст</p>
                <img class="messages_img_small" src="images/comm_image.png">
            </div>
        </div>
    </div>


    @stop
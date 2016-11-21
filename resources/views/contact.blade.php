@extends('app_page')


@section('header')


    @stop


@section('footer')



    @stop

@section('content')

    <div class="contacts_center">
        <p class="contacts_catalog">Контакты</p>
        <div class="contacts_li"></div>

        <div class="contacts_article">
            <div class="contacts_inform">
                <div class="contacts_whit contacts_map_location">
                    <p class="contacts_te contacts_ad">г. Брянск,<br>ул. Садовая, д. 9</p>
                </div>
                <div class="contacts_whit contacts_phonenum">
                    <p class="contacts_te contacts_ph"> 7 (999) 99-99-99</p>
                </div>
                <div class="contacts_whit contacts_email_addr">
                    <p class="contacts_te contacts_ph">123456@yandex.ru</p>
                </div>
                <div class="contacts_whit contacts_worktime">
                    <p class="contacts_te contacts_day">Режим работы:<br>с 9:00 до 17:00</p>
                    <p class="contacts_te contacts_day">Отправка посылки:<br>вторник, среда, пятница</p>
                </div>
            </div>

            <div class="contacts_div_map"><img src="images/map.jpg"></div>

            <div class="contacts_box">
                <p class="contacts_quest">Остались вопросы?</p>
                <input class="contacts_mail" placeholder="Имя" type="text">

                <input class="contacts_mail phonenumber" placeholder="Телефон" type="text">

                <input class="contacts_mail" placeholder="E-mail" type="text">

                <textarea class="contacts_message mail" placeholder="Сообщение"></textarea>

                <div class="contacts_second">
                    <input class="contacts_men contacts_po contacts_reg" value="Отправить" type="button">
                </div>
            </div>

        </div>
    </div>
    @stop
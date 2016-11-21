@extends('app_page')



@section('content')

    <div class="registration_center">
        <p class="registration_catalog">Регистрация</p>
        <div class="registration_li"></div>


        @if ($errors->has('name'))

            {{$errors}}

            @endif
        <div class="registration_info_reg">

            <div class="registration_box">
                <form action="{{ url('/register') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="registration_fir">
                        <p class="registration_mailo">Фамилия</p>
                        <input class="registration_mail" name="famaly" type="text" required></div>
                    <div class="registration_fir">
                        <p class="registration_mailo">Имя</p>
                        <input class="registration_mail" name="name" type="text" required></div>
                    <div class="registration_fir">
                        <p class="registration_mailo">Отчество</p>
                        <input class="registration_mail" name="patronymic" type="text" required></div>
                    <div class="registration_fir">
                        <p class="registration_mailo">Телефон</p>
                        <input class="registration_mail" name="phone" type="text" required></div>
                    <div class="registration_fir" style="">
                        <p class="registration_mailo">E-mail</p>
                        <input class="registration_mail" name="email" type="text" required></div>
                    <div class="registration_fir" style="">
                        <p class="registration_mailo">Адрес</p>
                        <input class="registration_mail" name="address" type="text" required></div>
                    <div class="registration_fir" style="">
                        <p class="registration_mailo">Индекс</p>
                        <input class="registration_mail" type="text" name="index" required></div>
                    <div class="registration_fir" style="">
                        <p class="registration_mailo">Пароль</p>
                        <input class="registration_mail" name="password" type="password" required></div>
                    <div class="registration_fir" style="">
                        <p class="registration_mailo">Повторите пароль</p>
                        <input class="registration_mail" type="password" name="password_confirmation" required></div>

                    <div class="registration_fir registration_check">
                        <input id="check" class="registration_checkbox registration_check" type="checkbox" name="check" value="1">
                        <label class="registration_labl" for="check">Подписаться на рассылку</label>
                    </div>
                    <div class="registration_second">
                        <a href="/login" class="registration_reg registration_men"> Войти</a>
                        <input class="registration_men registration_po registration_reg" value="Зарегистрироваться" type="submit">
                    </div>
                </form>
            </div>
            <div class="registration_right">
                <p class="registration_socio">Зарегистрироваться<br> с помощью социальных сетей</p>
                <div class="registration_iconss">
                    <img src="images/vk_reg.png">
                    <img src="images/dno_reg.png">
                    <img src="images/facebook_reg.png">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

    <script src="/public/includes/js/jquery.maskedinput.min.js"></script>

    <script>
        $("#mail4").mask("+7(999)999-9999");
    </script>

@stop
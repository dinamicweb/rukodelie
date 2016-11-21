<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рукоделие</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css">
</head>

<body class="registration_body">
<div class="registration_all">
    <div class="registration_first_line"></div>
    <header class="registration_header">

        <div class="registration_logo">
            <a href="#" class="registration_world">Мир рукоделия</a>
        </div>

        <div class="registration_order">
            <p class="registration_ord">Заказ от 300 рублей</p>
            <a href="#" class="registration_pho">7 (999) 999-99-99</a>
        </div>

        <div class="index_location">
            @include('location')
        </div>

        <div class="index_auth">
            @include('app-auth')
        </div>



        @include('basket')

    </header>

    <div class="registration_line"></div>

    <nav class="registration_menu">
        <ul>
            <li><a href="../" class="registration_men">Главная</a></li>
            <li><a href="#" class="registration_men">О нас</a></li>
            <li><a href="../oplata.html" class="registration_men">Оплата и доставка</a></li>
            <li><a href="#" class="registration_men">Распродажа</a></li>
            <li><a href="#" class="registration_men">Новинки</a></li>
            <li><a href="#" class="registration_men">Отзывы</a></li>
            <li><a href="#" class="registration_men">Контакты</a></li>
        </ul>
    </nav>

  @yield('content')

    <div class="registration_up">
        <a href="#"></a>
    </div>

    <div class="registration_last_line"></div>
    <footer class="registration_footer">

        <div class="registration_logo registration_lo"><a href="#" class="registration_world registration_wo">Мир рукоделия</a>
        </div>

        <a href="#" class="registration_to registration_men">Остались вопросы?</a>
        <a href="#" class="registration_pho registration_pip">7 (999) 999-99-99</a>
        <a href="#">
            <div class="registration_dno"></div>
        </a>

    </footer>
</div>

<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
@yield('footer')
<script>
    $(document).ready(function() {
        $(".registration_up").hide();
        $(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 1000) {
                    $('.registration_up').fadeIn();
                } else {
                    $('.registration_up').fadeOut();
                }
            });
            $('.registration_up a').click(function() {
                $('body,html').animate({
                    scrollTop: 0
                }, 400);
                return false;
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $(".registration_inn").click(function() {
            $('.registration_frame').toggle();
        });
        $(document).on('click', function(e) {
            if (!$(e.target).closest(".registration_auth").length) {
                $('.registration_frame').hide();
            }
            e.stopPropagation();
        });


    });
</script>


</body>

</html>
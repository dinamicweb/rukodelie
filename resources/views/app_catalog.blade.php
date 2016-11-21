<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рукоделие</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/navgoco.css"/>
    <link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css">
    @yield('header')
</head>

<body class="category_body">
<div class="category_all">
    <div class="category_first_line"></div>
    <header class="category_header">

        <div class="category_logo">
            <a href="#" class="category_world">Мир рукоделия</a>
        </div>

        <div class="category_order">
            <p class="category_ord">Заказ от 300 рублей</p>
            <a href="#" class="category_pho">7 (999) 999-99-99</a>
        </div>

        <div class="index_location">
            @include('location')
        </div>

        <div class="index_auth">
            @include('app-auth')
        </div>


       @include('basket')

    </header>
    <div class="category_line"></div>

    <nav class="category_menu">
        <ul>
            @include('top_nav')
        </ul>
    </nav>

    <div class="category_center">
        <div class="category_left">

            <div class="category_nfo">
                @include('left_info')
            </div>
            <div class="category_lin"></div>


            <nav class="category_my">
                <ul class="nav">
                    {!! \App\Helpers\CategoryHelpers::tree_category() !!}
                </ul>
            </nav>


        </div>


        <div class="category_article">


            @yield('content')

        </div>

    </div>

    <div class="category_up">
        <a href="#"></a>
    </div>

    <div class="category_last_line"></div>
    <footer class="category_footer">

        <div class="category_logo category_lo"><a href="#" class="category_world category_wo">Мир рукоделия</a>
        </div>

        <a href="#" class="category_to category_men">Остались вопросы?</a>
        <a href="#" class="category_pho category_pip">7 (999) 999-99-99</a>
        <a href="#">
            <div class="category_dno"></div>
        </a>

    </footer>
</div>
<script type="text/javascript" src="/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="/js/jquery.navgoco.js"></script>
@yield('footer')
<script>
    $(document).ready(function () {
        $(".category_up").hide();
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 1000) {
                    $('.category_up').fadeIn();
                } else {
                    $('.category_up').fadeOut();
                }
            });
            $('.category_up a').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 400);
                return false;
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $(".category_inn").click(function () {
            $('.category_frame').toggle();
        });
        $(document).on('click', function (e) {
            if (!$(e.target).closest(".category_auth").length) {
                $('.category_frame').hide();
            }
            e.stopPropagation();
        });


    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".nav").navgoco({
            accordion: true
        });
    });
</script>


</body>

</html>
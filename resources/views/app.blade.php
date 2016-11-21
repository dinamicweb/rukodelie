<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рукоделие</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/css/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="/css/navgoco.css"/>
    <link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css">
</head>

<body class="index_body">
<div class="index_all">
    <div class="index_first_line"></div>
    <header class="index_header">

        <div class="index_logo">
            <a href="#" class="index_world">Мир рукоделия</a>
        </div>

        <div class="index_order">
            <p class="index_ord">Заказ от 300 рублей</p>
            <a href="#" class="index_pho">7 (999) 999-99-99</a>
        </div>

        <div class="index_location">
          @include('location')
        </div>

        <div class="index_auth">
            @include('app-auth')
        </div>


      @include('basket')

    </header>
    <div class="index_line"></div>

    <nav class="index_menu">
        <ul>
            @include('top_nav')
        </ul>
    </nav>


    <div class="index_slider">
        <div class="index_one"><img src="images/slider.jpg"></div>
        <div class="index_two"><img src="images/slider.jpg"></div>
        <div class="index_three"><img src="images/slider.jpg"></div>

    </div>

    <div class="index_center">
        <div class="index_left">

            <div class="index_nfo">
                @include('left_info')
            </div>
            <div class="index_lin"></div>


            <nav class=" index_my">
                <ul class="nav">
                    {!! \App\Helpers\CategoryHelpers::tree_category()!!}
                </ul>
            </nav>


        </div>

        @yield('content')

    </div>

    <div class="index_up">
        <a href="#"></a>
    </div>

    <div class="index_last_line"></div>
    <footer class="index_footer">

        <div class="index_logo index_lo"><a href="#" class="index_world index_wo">Мир рукоделия</a>
        </div>

        <a href="#" class="index_to index_men">Остались вопросы?</a>
        <a href="#" class="index_pho index_pip">7 (999) 999-99-99</a>
        <a href="#">
            <div class="index_dno"></div>
        </a>

    </footer>
</div>

<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="js/slick.js"></script>
<script type="text/javascript" src="js/jquery.navgoco.js"></script>

<script>
    $(document).ready(function () {
        $(".index_up").hide();
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 1000) {
                    $('.index_up').fadeIn();
                } else {
                    $('.index_up').fadeOut();
                }
            });
            $('.index_up a').click(function () {
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

        $(".index_inn").click(function () {
            $('.index_frame').toggle();
        });
        $(document).on('click', function (e) {
            if (!$(e.target).closest(".index_auth").length) {
                $('.index_frame').hide();
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

<script type="text/javascript">
    $(document).ready(function () {
        $('.index_slider').slick({
            draggable: false,
            infinite: true,
            dots: true,
        });

    });
</script>


</body>

</html>
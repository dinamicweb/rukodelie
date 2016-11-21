@if(Auth::user())



    <div class="fa fa-user fa-2x"></div>
    <a href="#" class="user">{{Auth::user()->famaly}} {{Auth::user()->name}}</a>

    <a class="out" href="/logout">Выход</a>
@else

    <div class="index_lock"></div>

    <a class="index_inn" href="#">Вход</a>

    <div class="index_auth_frame index_frame">


        <form action="{{url('/login')}}" method="POST">
            {{ csrf_field() }}
            <input class="index_log" type="text" name="email" placeholder="Логин" required>
            <input class="index_log index_pass" type="password" name="password" placeholder="Пароль"
                   required>

            <p class="index_ent">Войти с помощью</p>
            <a href="#">
                <div class="index_ico index_vk"></div>
            </a>
            <a href="#">
                <div class="index_ico index_dno_1"></div>
            </a>
            <a href="#">
                <div class="index_ico index_face"></div>
            </a>
            <a class="index_forg" href="/password/reset"><i>Забыли пароль?</i></a>
            <input type="submit" name="ins" class="index_enter index_butt" value="Войти">
        </form>
        <a class="index_enter" href="/register">Зарегистрироваться</a>
    </div>
@endif
@extends('main')

@section('session')
    <?php
    session_start();
    ?>
    @endsection

@section('content')
    <div align="center"
         class="main">
        <form action="/authorization"
              id="loginform"
              method="post"
              name="loginform">
            <p><label for="user_email">Почта<br>
                    <input class="input"
                           id="user_email"
                           name="user_email"
                           size="20"
                           type="text">
                </label>
            </p>

            <p><label for="user_pass">Пароль<br>
                    <input class="input"
                           id="password"
                           name="password"
                           size="20"
                           type="password">
                </label>
            </p>

            <p class="submit">
                <input class="button"
                       id="login_btn"
                       name="login_btn"
                       type= "submit"
                       value="Log In"
                       onclick=loginUser()>
            </p>
            <p class="href_area">
                <a href="registration"
                   id = "reghref"
                   style="color: #4d4d4d">Регистрация</a>
                |
                <a href="reset_passw"
                   id="resethref"
                   style="color: #4d4d4d">Напомнить пароль?</a>
                |
                <a href="/?action=out"
                   id="outhref"
                   style="color: #4d4d4d">Выйти</a>
            </p>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript"
            src="../../js/login.js"></script>
@endsection
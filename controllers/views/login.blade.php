@extends('main')

@section('content')
    <div align="center"
         class="main">
        <form action=""
              id="loginform"
              method="post"
              name="loginform">
            <p><label for="user_login">Имя пользователя<br>
                    <input class="input"
                           id="username"
                           name="username"
                           size="20"
                           type="text"
                           value=""
                           data-help="Логин должен состоять из ...">
                </label>
            </p>

            <p><label for="user_pass">Пароль<br>
                    <input class="input"
                           id="password"
                           name="password"
                           size="20"
                           type="password"
                           value="">
                </label>
            </p>

            <p class="submit">
                <input class="button"
                       id="login"
                       name="login"
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
            </p>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript"
            src="../../js/login.js"></script>
@endsection
@extends('main')

@section('content')
    <div align="center" class="main">
        <form action="login.php" id="loginform" method="post"name="loginform">
            <p><label for="user_login">Имя пользователя<br>
                    <input class="input" id="username" name="username"size="20"
                           type="text" value=""></label></p>
            <p><label for="user_pass">Пароль<br>
                    <input class="input" id="password" name="password"size="20"
                           type="password" value=""></label></p>
            <p class="submit">
                <input class="button" name="login"type= "submit" value="Log In">
            </p>
            <p class="href_area">
                <a href="{registration-link}" style="color: #4d4d4d">Регистрация</a> | <a href="{lostpassword-link}" style="color: #4d4d4d">Напомнить пароль?</a>
            </p>
        </form>
    </div>
@endsection
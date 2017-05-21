@extends('main')

@section('session')
    @endsection

@section('content')
    <h1>todos</h1>
    <div align="center" class="main">
        <form id="loginForm" method="post" name="loginForm">

            <div id="loginResult" class="success">Авторизация</div>

            <p><label for="user_login">Имя пользователя<br><input class="input" id="username" name="username" size="20" type="text" value="" data-help="Логин должен состоять из ..."></label></p>

            <p><label for="user_pass">Пароль<br> <input class="input" id="password" name="password" size="20" type="password" value=""></label></p>

            <p class="submit"> <input class="button" id="login" name="login" type= "submit" value="Log In"></p>
            <p class="href_area"> <a href="/registration" id = "reghref" style="color: #4d4d4d">Регистрация</a> | <a  id="resethref" style="color: #4d4d4d">Напомнить пароль?</a></p>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="/js/login.js"></script>
@endsection


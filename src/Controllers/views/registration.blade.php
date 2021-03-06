@extends('main')

@section('content')
    <h1>todos</h1>
    <div align="center" class="main">
        <form action="" id="registerform" method="post" name="registerform">

            <div id="regResult" class="success">Регистрация</div>

            <p><label for="user_pass">E-mail<br> <input class="input" id="email" name="email" size="20" type="email" value=""></label></p>
            <p><label for="user_pass">Имя пользователя<br><input class="input" id="username" name="username" size="20" type="text" value=""></label></p>
            <p><label for="user_pass">Пароль<br><input class="input" id="password" name="password" size="20" type="password" value=""></label></p>
            
            <p class="submit" style="padding-top: 8px"><input class="button" id="reg" name= "reg" type="submit" value="Зарегистрироваться"></p>

            <p class="href_area"> Уже зарегистрированы? <a href= "/login" style="color: #4d4d4d">Войти!</a></p>
        </form>
    </div>

    @endsection

@section('scripts')
    <script type="text/javascript" src="/js/registration.js"></script>
@endsection
@extends('main')

@section('content')
    <div align="center" class="main">
        <form action="register.php" id="registerform" method="post"name="registerform">
            <p><label for="user_pass">E-mail<br>
                    <input class="input" id="email" name="email" size="20" type="email" value=""></label>
            </p>
            <p><label for="user_pass">Имя пользователя<br>
                    <input class="input" id="username" name="username" size="20" type="text" value=""></label>
            </p>
            <p><label for="user_pass">Пароль<br>
                    <input class="input" id="password" name="password" size="20"   type="password" value=""></label>
            </p>
            
            <p class="submit" style="padding-top: 8px"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
            <p class="href_area">Уже зарегистрированы? <a href= "login.php" style="color: #4d4d4d">Войти!</a></p>
        </form>
    </div>

    @endsection
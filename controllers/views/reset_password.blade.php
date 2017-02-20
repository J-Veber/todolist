@extends('main')

@section('content')
    <div align="center" class="main">
        <form action="reset_password.php" id="registerform" method="post" name="registerform">
            <p><label for="registerform">Введите почтовый ящик или логин: <br>
                <input id="input_text" name="text" size="20" type="text" value=""></label>
            </p>

            <p style="padding-top: 8px">
                <input class="button" id="reset" name= "reset" type="submit" value="Восстановить пароль">
            </p>
                                                                {{--действие на ссылку--}}
            <p class="href_area"><a href= "login.php" style="color: #4d4d4d;">Войти</a></p>
        </form>
    </div>
    @endsection


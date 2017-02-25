@extends('main')

@section('content')
    <div align="center" class="main">
        <form   action="reset_password.php"
                id="registerform"
                method="post"
                name="registerform">

            <p><label for="registerform">Введите почтовый ящик: <br>
                <input id="input_text"
                       name="input_text"
                       size="20"
                       type="text"
                       value=""></label>
            </p>

            <p style="padding-top: 8px">
                <input class="button"
                       id="reset_btn"
                       name= "reset_btn"
                       type="submit"
                       value="Восстановить пароль"
                       onclick="resetUserPassw()">
            </p>

            <p class="href_area">
                <a href= "authorization"
                   style="color: #4d4d4d;">Войти</a>
            </p>
        </form>
    </div>
    @endsection

@section('scripts')
    <script type="text/javascript"
            src="../../js/reset.js"></script>
@endsection


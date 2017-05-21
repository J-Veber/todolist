@extends('main')

@section('content')
    <h1>todos</h1>
    <div align="center" class="main">
        <form   action="" id="registerform" method="post" name="registerform">

            <p><label for="registerform">Введите почтовый ящик: <br><input id="input_text" name="text" size="20" type="text" value=""></label></p>

            <p style="padding-top: 8px"><input class="button" id="reset" name= "reset" type="submit" value="Восстановить пароль" onclick="resetUserPassw()"></p>

            <p class="href_area"><a href= "login.blade.php" style="color: #4d4d4d;">Войти</a></p>
        </form>
    </div>
    @endsection

@section('scripts')
    <script type="text/javascript"></script>
@endsection


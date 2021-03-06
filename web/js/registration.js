$(document).ready(function () {
    $("form#registerform").submit(function (event)
    {
        event.preventDefault();

        var username = $('#username').val();
        var password = $('#password').val();
        var email = $('#email').val();

        if (checkRegister(username, password, email))
        {
            $.post(
                "api/registration",
                {
                    submit: true,
                    username: username.toString(),
                    password: password.toString(),
                    email: email.toString()
                },
                onAjaxResponse
            );
        }
    })
});

function onAjaxResponse(data)
{
    if (data.toString() === "true")
    {
        $('#regResult').text("Вы успешно зарегистрированы")
            .css({'padding' : '0.8em', 'margin-bottom' : '1em', 'background' : '#e6efc2', 'color' : '#264409', 'border' : '2px #c6d880', 'display' : 'block'});
    } else
    {
        $('#regResult').text("Пользователь с таким именем уже существует")
            .css({'background' : '#fbe3e4','color' : '#8a1f11', 'padding' : '0.8em', 'margin-bottom' : '1em', 'border' : '2px #fbc2c4'});
    }

}

function checkRegister(name, passw, email) {
    var res = true;
    var text = "";
    var patternLogin = /^(?=.{4,14})[a-z][a-z0-9]*[._-]?[a-z0-9]+$/;
    var patternEmail = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/;
    if (!patternLogin.test(name.toLowerCase()))
    {
        text += "логин должно состоять из букв латинского алфавита или цифр; \n";
        res = false;
    }
    if (name.toString().length < 4 || name.toString().length > 12)
    {
        text += "длина логина не должна быть меньше 4 и больше 12 символов; \n";
        res = false;
    }
    if (parseInt(name.substr(0,1)))
    {
        text += "имя не должно начинаться с цифры; \n";
        res = false;
    }
    if (passw.toString().length < 4 || passw.toString().length > 13) {
        text += "длина пароля не должна быть меньше 4 и больше 13 символов; \n";
        res = false;
    }
    if (!patternEmail.test(email))
    {
        text += "введите email правильно. например, example@gmail.com; \n";
        res = false;
    }

    if (res === false)
    {
        $('div#regResult').text(text)
            .css({'background' : '#fbe3e4','color' : '#8a1f11', 'padding' : '0.8em', 'margin-bottom' : '1em', 'border' : '2px #fbc2c4'});
    }
    return res;
}
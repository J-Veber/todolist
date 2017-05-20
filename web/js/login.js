$(document).ready(function () {
    $("form#loginForm").submit(function (event)
    {
        event.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();
        if (checkLogin(username, password) && username !== "" && password !== "")
        {
            $.post(
                "api/login",
                {
                    submit: true,
                    username: username.toString(),
                    password: password.toString()
                },
                onAjaxResponseForLogin
            );
        }
    })
});

function onAjaxResponseForLogin(data) {
    if (data.toString() === "false")
    {
        $('#loginResult').text("Неверно введены логин/пароль")
            .css({'background' : '#fbe3e4','color' : '#8a1f11', 'padding' : '0.8em', 'margin-bottom' : '1em', 'border' : '2px #fbc2c4'});
    } else
    {
        window.location.href = "/todos";
    }
}

function checkLogin(name, passw) {
    var res = true;
    var text = "";
    var pattern = /^(?=.{4,14})[a-z][a-z0-9]*[._-]?[a-z0-9]+$/;
    if (!pattern.test(name))
    {
        text += "логин должен состоять из букв латинского алфавита или цифр; \n";
        res = false;
    }
    if (name.toString().length < 4 || name.toString().length > 13)
    {
        text += "длина логина не должна быть меньше 4 и больше 13 символов; \n";
        res = false;
    }
    if (parseInt(name.substr(0,1)))
    {
        text += "логин не должен начинаться с цифры; \n";
        res = false;
    }
    if (passw.toString().length < 4 || passw.toString().length > 13)
    {
        text += "длина пароля не должна быть меньше 4 и больше 13 символов; \n";
        res = false;
    }
    if (res === false)
    {
        $('div#loginResult').text(text)
            .css({'background' : '#fbe3e4','color' : '#8a1f11', 'padding' : '0.8em', 'margin-bottom' : '1em', 'border' : '2px #fbc2c4'});
    }

    return res;
}
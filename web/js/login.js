$(document).ready(function () {
    $("form#loginForm").submit(function (event)
    {
        event.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();
        if (checkLogin(username, password) && username !== "" && password !== "")
        {
            $.ajax({
                type: "POST",
                //url: "../controllers/LoginController.php",
                url: "../src/Controllers/views/testView.php",
                cache: false,
                contentType: "application/json; charset=utf-8",
                datatype: 'json',
                data: 'username=' + username + '&password=' + password,
                success: function()
                {
                    //alert('Load was performed.');
                    $('#loginResult').text("Data was sended to server. Login/passw" + username.toString() + ", " + password.toString())
                        .css({'padding' : '0.8em', 'margin-bottom' : '1em', 'background' : '#e6efc2', 'color' : '#264409', 'border' : '2px #c6d880', 'display' : 'block'});
                },
                error: function ()
                {
                    $('#loginResult').text("ERROR")
                        .css({'background' : '#fbe3e4','color' : '#8a1f11', 'padding' : '0.8em', 'margin-bottom' : '1em', 'border' : '2px #fbc2c4'});
                }
            });
        }
    })
});



function checkLogin(name, passw) {
    var res = true;
    var text = "";
    var pattern = /^(?=.{4,14})[a-z][a-z0-9]*[._-]?[a-z0-9]+$/;
    if (!pattern.test(name))
    {
        text += "логин должен состоять из букв латинского алфавита или цифр; \n";
        res = false;
    }
    if (name.toString().length < 6 || name.toString().length > 15)
    {
        text += "длина логина не должна быть меньше 6 и больше 15 символов; \n";
        res = false;
    }
    if (parseInt(name.substr(0,1)))
    {
        text += "логин не должен начинаться с цифры; \n";
        res = false;
    }
    if (passw.toString().length < 5 || passw.toString().length > 15)
    {
        text += "длина пароля не должна быть меньше 5 и больше 15 символов; \n";
        res = false;
    }
    if (res === false)
    {
        $('div#loginResult').text(text)
            .css({'background' : '#fbe3e4','color' : '#8a1f11', 'padding' : '0.8em', 'margin-bottom' : '1em', 'border' : '2px #fbc2c4'});
    }

    return res;
}

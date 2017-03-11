var
    emptyfield = 'Заполните поле!',
    shortLogin = 'Логин короче 5 символов',
    shortPass = 'Пароль короче 6 символов',
    badMail = 'email не корректен',
    notUniqueLogin = 'Такой пользователь уже существует';

var req = false;

if (window.XMLHttpRequest) req = new XMLHttpRequest();
    else if (window.ActiveXObject) req = new ActiveXObject("Microsoft.XMLHTTP");

//----------------------- REGISTRATION -----------------------------------------------
function regUser() {
    var button = document.querySelector("#reg_btn");
    button.addEventListener("click", isValidForm());
}

function isValidForm() {
    var elements = document.getElementById('registerform').elements,
        login = document.getElementById('username'),
        passw = document.getElementById('password'),
        email = document.getElementById('email'),
        valid = true;

    for (var i = 0; i < elements.length; ++i)
    {
        if (elements[i].error) valid = false;
        if ((elements[i].type == 'text' || elements[i].type == 'password') && isEmptyStr(elements[i].value))
        {
            notValidField(elements[i], emptyfield);
            elements[i].type = 'text';
        }
    }
    checkUsername();
    checkPassword();
    checkEmail();
    console.log(valid);
    return valid;
}

function isEmptyStr(str) {
    if (str == "") return true;
    var count = 0;
    for (var i = 0; i < str.length; ++i)
        if (str.charAt(i) == " ") ++count;
    return count == str.length;
}

function notValidField(field, str) {
    field.value = str;
    field.error = true;
    valid = false;

    field.onfocus = function () {
        if (field.id == 'password') field.type = 'password';
        if (field.error) field.value = '';
    }
    field.onblur = function () {
        if (isEmptyStr(field.value))
        {
            notValidField(field, emptyfield);
            if (field.id == 'password' ) field.type = 'text';
        } else
        {
            field.error = false;
            switch (field.id) {
                case 'username':
                    checkUsername();
                    break;
                case 'password':
                    checkPassword();
                    break;
                case 'email':
                    checkEmail();
                    break;
            }
        }
    }
}

function checkUsername() {
    if (username.value.length < 5 && !username.error)
    {
        notValidField(username, shortLogin);
    } else
        if (!username.error)
        {
            req.open('GET', '../controllers/RegistrationController.php?isset_login='
                + encodeURIComponent(username.value), false);
            console.log('../controllers/RegistrationController.php?isset_login='
                + encodeURIComponent(username.value));
            if (req.readyState == 4 && req.status == 200)
            {
                if (req.responseText == '1')
                {
                    notValidField(username, notUniqueLogin);
                }
            }
        }
}

function checkPassword() {
    if(!password.error) {
        if(password.value.length < 6 ) {
            notValidField(password, shortPass);
            password.type = 'text';
        }
    }
}

function checkEmail() {
    if (!email.error && !/^([a-z0-9])(\w|[.]|-|_)+([a-z0-9])@([a-z0-9])([a-z0-9.-]*)([a-z0-9])([.]{1})([a-z]{2,4})$/i.test(email.value))
        notValidField(email, badMail);
}

//---------------- RESET PASSWORD -----------------------------------
function resetUserPassw() {
    var button = document.querySelector("#reset");
    button.addEventListener("click", callRegController());
}

function callRegController() {
    $.post(
        "../controllers/ResetController.php",
        //"ЭТА ШТУКА ОБРАБАТЫВАЕТ ЭТУ ФОРМУ .php",
        {reset: "submit"}
    );
}
// ------------------- LOGIN USER -----------------------------------
function loginUser() {
    var button = document.querySelector("#login_btn");
    button.addEventListener("click", checkData());
}

function checkData() {
    var elements = document.getElementById('loginform').elements,
        passw = document.getElementById('password'),
        email = document.getElementById('email'),
        valid = true;

    for (var i = 0; i < elements.length; ++i)
    {
        if (elements[i].error) valid = false;
        if ((elements[i].type == 'text' || elements[i].type == 'password') && isEmptyStr(elements[i].value))
        {
            notValidField(elements[i], emptyfield);
            elements[i].type = 'text';
        }
    }
    checkPassword();
    checkEmail();
    console.log(valid);
    return valid;
}

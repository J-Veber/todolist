var
    emptyfield = 'Заполните поле!',
    shortLogin = 'Логин короче 5 символов',
    shortPass = 'Пароль короче 6 символов',
    badMail = 'email не соответствует шаблону example@my.smt',
    notUniqueLogin = 'Пользователь с таким почтовым ящиком уже существует';

var req = false;

if (window.XMLHttpRequest) req = new XMLHttpRequest();
    else if (window.ActiveXObject) req = new ActiveXObject("Microsoft.XMLHTTP");

function regUser() {
    var button = document.querySelector("#reg");
    button.addEventListener("click", callRegController());
}

function callRegController() {
    $.post(
        "../controllers/RegistrationController.php",
        //"ЭТА ШТУКА ОБРАБАТЫВАЕТ ЭТУ ФОРМУ .php",
        {reg: "submit"}
    );
}

function isEmptyStr(str) {
    if (str == "") return true;
    var count = 0;
    for (var i = 0; i &lt; str.length; ++i)
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
    if (username.value.length &lt; 5 &amp;&amp; !username.error)
    {
        notValidField(username, shortLogin);
    } else
        if (!username.error)
        {
            req.open('GET', '../controllers/RegistrationController.php?isset_login='
            + encodeURIComponent(username.value), false);
            console.log('../controllers/RegistrationController.php?isset_login='
                + encodeURIComponent(username.value));
            if (req.readyState == 4 &amp;&amp; req.status == 200)
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
        if(password.value.length &lt; 6 ) {
            notValidField(password, shortPass);
            password.type = 'text';
        }
    }
}

function checkEmail() {
    if(!email.error &amp;&amp; !/^([a-z0-9])(\w|[.]|-|_)+([a-z0-9])@([a-z0-9])([a-z0-9.-]*)([a-z0-9])([.]{1})([a-z]{2,4})$/i.test(email.value))
        notValidField(email, badMail);
}

function isValidForm() {
    var elements = ge('registerform').elements,
        login = ge('username'),
        passw = ge('password'),
        email = ge('email'),
        valid = true;

    for (var i = 0; i &lt; elements.length; ++i)
    {
        if (elements[i].error) valid = false;
        if ((elements[i].type == 'text' || elements[i].type == 'password') &amp;&amp; isEmptyStr(elements[i].value))
        {
            notValidField(elements[i], emptyfield);
            elements[i].type = 'text';
        }
    }
    checkUsername();
    checkPassword();
    checkEmail();
    return valid;
}

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

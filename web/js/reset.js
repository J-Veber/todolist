function resetUserPassw() {
    var button = document.querySelector("#reset");
    button.addEventListener("click", callRegController());
}

function callRegController() {
    $.post(
        //"ЭТА ШТУКА ОБРАБАТЫВАЕТ ЭТУ ФОРМУ .php",
        {reset: "submit"}
    );
}
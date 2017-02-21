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
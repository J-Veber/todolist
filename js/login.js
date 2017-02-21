function loginUser() {
    var button = document.querySelector("#login");
    button.addEventListener("click", once());
}

function once() {
//                    alert("YP");
    $.post(
        "../controllers/AuthorizationController.php",
        //"ЭТА ШТУКА ОБРАБАТЫВАЕТ ЭТУ ФОРМУ .php",
        {login: "submit"}
    );
}

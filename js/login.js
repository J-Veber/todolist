var button = document.querySelector("#login");
function once() {
//                    alert("YP");
    $.post(
        "ЭТА ШТУКА ОБРАБАТЫВАЕТ ЭТУ ФОРМУ .php",
        { user_log: "submit"}
    );
}
button.addEventListener("click", once);

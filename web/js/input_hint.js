var username = document.querySelector("#username");
var password = document.querySelector("#password");
var email = document.querySelector("#email");
var otherText = document.querySelector("#input_text");

var fields = [];
fields[0] = username;
fields[1] = password;
fields[2] = email;
fields[3] = otherText;

username.addEventListener("focus", function(event) {
    var text = event.target.getAttribute("data-help");
    username.textContent = text;
});
username.addEventListener("blur", function(event) {
    username.textContent = "";
});


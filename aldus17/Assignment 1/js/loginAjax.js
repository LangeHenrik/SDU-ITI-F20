function login(form) {
    var username = form.username.value;
    var password = form.password.value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("post", "loginbtn", true);
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            loginResults();
        }
    }
}

window.addEventListener(window, "load", function() {
    var loginForm = document.getElementById("LoginForm");
    window.addEventListener(loginForm, "submit", function() {
        login(loginForm);
    });
});

function loginResults() {
    var loggedIn = document.getElementById("LoggedIn");
    var badLogin = document.getElementById("BadLogin");
    if (xmlhttp.responseText.indexOf("failed") == -1) {
        loggedIn.innerHTML = "Logged in as " + xmlhttp.responseText;
        loggedIn.style.display = "block";
        form.style.display = "none";
    } else {
        badLogin.style.display = "block";
        form.Username.select();
        form.Username.className = "Highlighted";
        setTimeout(function() {
            badLogin.style.display = 'none';
        }, 3000);
    }
}
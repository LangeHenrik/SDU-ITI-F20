function callAjax() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ajaxHolder").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/rayou18,%20kalau17,%20jlaur13/mvc/public/Home/login", true);
    xhttp.send();
}

function signUpAjax() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ajaxHolder").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/rayou18,%20kalau17,%20jlaur13/mvc/public/Home/signup", true);
    xhttp.send();
}

function checkLogin(event) {
    console.log('Hello there!')
    event.preventDefault();
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;

    var xttp = new XMLHttpRequest();
    xttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            window.location = "/rayou18,%20kalau17,%20jlaur13/mvc/public/";
        }
    }
    xttp.open("POST", "/rayou18,%20kalau17,%20jlaur13/mvc/public/Home/login");
    xttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xttp.send(`username=${username}&password=${password}`);
}

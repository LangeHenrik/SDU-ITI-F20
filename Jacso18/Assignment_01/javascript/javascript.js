function checkform() {
    return checkname() &&
        checkpassword() &&
        checkMail();
}

function checkname() {
    let nameRegEx = new RegExp(/[A-Za-zÆØÅæøå1-9]{1,}/g);
    let nameInput = document.getElementById("username");
    if (nameRegEx.test(nameInput.value)) {
        console.log('Cool name');
        document.getElementById("username").style.borderBottomColor = "#009933";
        return true;
    } else {
        console.log('Not so cool name');
        document.getElementById("username").style.borderBottomColor = "grey";
        return false;
    }
}

function checkpassword() {
    let passwordRegEx = new RegExp(/[A-Za-zÆØÅæøå\d@$!%*#?&]{8,}/g);
    let passwordInput = document.getElementById("password");
    if (passwordRegEx.test(passwordInput.value)) {
        console.log('Password good');
        document.getElementById("password").style.borderBottomColor = "#009933";
        return true;
    } else {
        console.log('Password not good');
        document.getElementById("password").style.borderBottomColor = "grey";
        return false;
    }
}


function checkMail() {
    let mailRegEx = new RegExp(/\S+@\S+\.([a-z]|[A-Z]){1,5}/g);
    let mailInput = document.getElementById("email");
    if (mailRegEx.test(mailInput.value)) {
        console.log('mail good');
        document.getElementById("email").style.borderBottomColor = "#009933";
        return true;
    } else {
        console.log('mail not good');
        document.getElementById("email").style.borderBottomColor = "grey";
        return false;
    }
}

function showPosts(str) {


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "../backend/getUserAJAX.php?q=" + str, true);
    xmlhttp.send();

}

document.addEventListener("DOMContentLoaded", function() {
    showPosts(document.getElementById("search").value);
  });





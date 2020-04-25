console.log('js working');

function checkform() {
    if (checkname() && checkpassword()) {
        return true;
    } else {
        document.getElementById("submitinfo").innerHTML = "Invalid form input.";
        return false;
    }
}

//NAME
let usernameRegEx = new RegExp(/^[\w|æøå|ÆØÅ|\d]+$/);
let usernameInput = document.getElementById("username");
usernameInput.addEventListener('keyup', checkname);

function checkname() {
    var usernameIcon = document.getElementById("usernameIsValidIcon");

    if (usernameRegEx.test(usernameInput.value)) {
        usernameIcon.style.color = "green";
        usernameIcon.classList.add("fa-check-circle");
        usernameIcon.classList.remove("fa-times-circle");
        return true;
    } else {
        usernameIcon.style.color = "red";
        usernameIcon.classList.add("fa-times-circle");
        usernameIcon.classList.remove("fa-check-circle");
        return false;
    }
}

//PASSWORD
let passwordRegEx = new RegExp(/^(?=.*[A-ZÆØÅ])(?=.*[a-zæøå])[A-ZÆØÅa-zæøå\d]{8,}$/);
let passwordInput = document.getElementById("password");
passwordInput.addEventListener('keyup', checkpassword);

function checkpassword() {

    var passwordIcon = document.getElementById("passwordIsValidIcon");

    if (passwordRegEx.test(passwordInput.value)) {
        passwordIcon.style.color = "green";
        passwordIcon.classList.add("fa-check-circle");
        passwordIcon.classList.remove("fa-times-circle");
        return true;
    } else {
        passwordIcon.style.color = "red";
        passwordIcon.classList.add("fa-times-circle");
        passwordIcon.classList.remove("fa-check-circle");
        return false;
    }
}
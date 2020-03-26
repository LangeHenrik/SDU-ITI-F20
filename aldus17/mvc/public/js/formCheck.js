console.log("js successfully loaded")

function checkForm() {
    checkFullname();
    checkPassword();
    checkEmailAddress();
    checkUsername();
}

function checkFullname() {
    var fullname = document.getElementById("fullname");
    var regEx = new RegExp(/(^(\w+\s+\D).+$)/g);

    if (regEx.test(fullname.value)) {
        changeLabelColor("fullname-label", "LawnGreen");
    } else {
        changeLabelColor("fullname-label", "Maroon");
    }
}

function checkPassword() {
    var password = document.getElementById("password");
    var regEx = new RegExp(/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{8,}/gm);
    password.setAttribute('title', 'Password should be at least one capital letter, one small letter, one number and 8 character length');

    if (regEx.test(password.value)) {
        changeLabelColor("password-label", "LawnGreen");
    } else {
        changeLabelColor("password-label", "Maroon");

    }
}

function checkEmailAddress() {
    var email = document.getElementById("email");
    var regEx = new RegExp(/(\b[\w\.-]+@[\w\.-]+\.\w{2,26}\b)/gi);

    if (regEx.test(email.value)) {
        changeLabelColor("email-label", "LawnGreen");

    } else {
        changeLabelColor("email-label", "Maroon");
    }
}

function checkUsername() {
    var username = document.getElementById("username");
    var regEx = new RegExp(/^([A-Za-z0-9]){4,20}$/gm);

    username.setAttribute("pattern", "([A-Za-z0-9]){4,20}");
    username.setAttribute("title", "Value must be from 4 to 20 characters in length, only allow letters and numbers, no special characters.");

    if (regEx.test(username.value)) {
        changeLabelColor("username-label", "LawnGreen");
    } else {
        changeLabelColor("username-label", "Maroon");
    }

}

function validatePassword() {
    if (document.getElementById('password').value == document.getElementById('password_confirm').value) {
        document.getElementById('message').style.color = 'LawnGreen';
        document.getElementById('message').innerHTML = 'password matching';
        return true;
    } else {
        document.getElementById('message').style.color = 'Maroon';
        document.getElementById('message').innerHTML = 'password not matching';

        return false;
    }
}

function processForm() {
    var capture = document.forms["input"]["username"].value;
}

function changeLabelColor(labelName, color) {
    return document.getElementById(labelName).style.color = color;
}
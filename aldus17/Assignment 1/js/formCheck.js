console.log("js successfully loaded")

function checkForm() {
    checkWords();
    checkPassword();
    checkEmailAddress();
    checkUsername();
}
// https://regex101.com/
// https://regexr.com/

function checkWords() {
    var word = document.getElementById("fullname").value;

    var regEx = new RegExp(/(^(\w+\s).+$)/g);

    if (regEx.test(word)) {
        changeLabelColor("fullname-label", "green");
        return true;
    } else {
        changeLabelColor("fullname-label", "red");
        return false;
    }
}

// "^$" whole string and needs to end with /gm, m means multiline, "?=.*" look for one or more of the following occourence, the ".*" means any char except line break
function checkPassword() {
    var password = document.getElementById("password").value;
    var regEx = new RegExp(/((?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*\w).[\S]{8,})/g);

    if (regEx.test(password)) {
        changeLabelColor("password-label", "green");
        return true;
    } else {
        changeLabelColor("password-label", "red");
        return false;
    }
}

function checkEmailAddress() {
    var email = document.getElementById("email").value;
    var regEx = new RegExp(/(\b[\w\.-]+@[\w\.-]+\.\w{2,10}\b)/gi);

    if (regEx.test(email)) {
        changeLabelColor("email-label", "green");
        return true;

    } else {
        changeLabelColor("email-label", "red");
        return false;
    }
}

/**
 * Minimum length (3). 
 * Maximum length(16). 
 * Can only contain alphanumeric characters and the following special characters: dot (.), underscore(_) and dash (-). 
 * The special characters cannot appear more than once consecutively or combined.
 */

function checkUsername() {
    var username = document.getElementById("username");
    // var usr = document.getElementById("username").addEventListener("invalid");
    var regEx = new RegExp(/(?!.*[\.\-\_]{2,})^[a-zA-Z0-9\.\-\_]{3,16}$/gm);
    username.setAttribute("pattern", "(?!.*[\.\-\_]{2,})^[a-zA-Z0-9\.\-\_]{3,16}");
    username.setAttribute("title", "Length should be between 3-16.\
     Can only contain alphanumeric characters and the following special characters: dot (.), underscore(_) and dash (-).\
    special characters cannot appear more than once consecutively or combined.");


    if (regEx.test(username.value)) {
        changeLabelColor("username-label", "green");
        return true;

    } else {
        changeLabelColor("username-label", "red");

    }
    return false;
}


function validatePassword() {
    if (document.getElementById('password').value == document.getElementById('password_confirm').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'password matching';
        return true;
    } else {
        document.getElementById('message').style.color = 'red';
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
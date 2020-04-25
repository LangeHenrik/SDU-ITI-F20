console.log("js successfully loaded");
var my_css_class = { backgroundColor: 'blue', color: '#fff' };

var body = {
    fontFamily: 'Arial, Helvetica, sans-serif',
    textAlign: 'center',
    background: 'linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab)',
    backgroundSize: '400% 400%',
    animation: 'gradient 15s ease infinite',
};

$(window).load(function() {
    $('body').css(body);
});

/* $(document).ready(function() {

    // Total seconds to wait
    var seconds = 3;

    function countdown() {
        seconds = seconds - 1;
        if (seconds < 0) {
            // Chnage your redirection link here
            window.location = "https://duckdev.com";
        } else {
            // Update remaining seconds
            document.getElementById("redirectMsg").innerHTML = seconds;
            // Count down using javascript
            window.setTimeout("countdown()", 1000);
        }
    }

    // Run countdown function

    countdown();
    console.log(countdown());

}); */

document.addEventListener('DOMContentLoaded', function() {
    checkForm()
});

function checkForm() {
    checkFullname();
    checkPassword();
    checkEmailAddress();
    checkUsername();
}

function checkFullname() {
    var fullname = document.getElementById("fullname");
    var regEx = new RegExp(/(^(\w+\s+\D).+$)/g);
    fullname.setAttribute('title', 'Please enter your first and lastname');

    if (regEx.test(fullname.value)) {
        changeLabelColor("fullname-label", "LawnGreen");
    } else {
        changeLabelColor("fullname-label", "Maroon");
    }
}

function checkPassword() {
    var password = document.getElementById("password");
    var regEx = new RegExp(/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{8,}/gm);
    //password.setAttribute('pattern', "(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{8,}");
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
        if (document.getElementById('password').value != '') {
            document.getElementById('message').style.color = 'LawnGreen';
            document.getElementById('password_confirm-label').style.color = 'LawnGreen';
            document.getElementById('message').innerHTML = 'password matching';
            return true;
        }

    } else {
        if (document.getElementById('password').value != '') {
            document.getElementById('message').style.color = 'Maroon';
            document.getElementById('password_confirm-label').style.color = 'Maroon';
            document.getElementById('message').innerHTML = 'password not matching';
        }

        return false;
    }
}

function processForm() {
    var capture = document.forms["input"]["username"].value;
}

function changeLabelColor(labelName, color) {
    return document.getElementById(labelName).style.color = color;
}
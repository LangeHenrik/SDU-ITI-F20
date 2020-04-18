console.log("My Script");

function q(search) {
    return document.querySelector(search);
}

if (q('.fileInput')) {
    q('.fileInput').addEventListener('change', function () {
        let fileName = q('.fileInput').value.split('\\').pop();
        q('#uploadInfo').innerHTML = fileName;
    });
}

// Check username availability
function checkUsername() {
    if (nameRegex()) {
        let username = q('input#username').value;
        fetch('/kivin18/mvc/public/api/checkusername/' + username, {
            method: 'GET',
        }).then(function (response) {
            return response.text();
        }).then(function (text) {
            q('small#usernameInfo').innerHTML = text;
        }).catch(function (error) {
            console.log('Request failed: ' + error);
        });
        return true;
    } else {
        return false;
    }
}

// Regex
function nameRegex() {
    let name = q('input#username').value;
    let label = q('small#usernameInfo');
    let regex = new RegExp(/^\S\w{5,50}$/);
    if (regex.test(name)) {
        label.innerHTML = '';
        return true;
    } else {
        label.innerHTML = 'Username must be between 5-50 characters. No spaces allowed!';
        return false;
    }
}

function checkPass() {
    let pass = q('input#password').value;
    let label = q('small#passwordInfo');
    let regex = new RegExp(/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/);
    if (regex.test(pass)) {
        label.innerHTML = '';
        return true;
    } else {
        label.innerHTML = 'Password must contain at least 8 characters, 1 lower case, 1 upper case, 1 numeric and 1 of these special characters: !@#$%^&*';
        return false;
    }
}

function confirmPass() {
    let pass = q('input#password').value;
    let passRepeat = q('input#passwordRepeat').value;
    let label = q('small#passwordInfo');
    if (passRepeat === pass) {
        label.innerHTML = "";
        return true;
    } else {
        label.innerHTML = "Passwords don't match!";
        return false;
    }
}

function checkRegisterFields() {
    return checkUsername() && checkPass() && confirmPass();
}
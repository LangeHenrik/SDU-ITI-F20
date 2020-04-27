console.log('inside validate.js');

function checkform(){
    let result1 = checkname();
    let result2 = checkpassword();
    let result3 = checkpassword_confirm();
    if ((result1 && result2 && result3) == true) {
        return true;
    }
    return false;
}

// name
let nameRegEx = new RegExp(/^[a-zA-Z0-9]*$/);
let nameInput = document.getElementById("username");
nameInput.addEventListener('keyup', checkname);

function checkname () {
    if(nameRegEx.test(nameInput.value)) {
        nameInput.style.borderColor = "green";
        return true;
    } else {
        nameInput.style.borderColor = "red";
        return false;
    }
}

// password
let passwordRegEx = new RegExp(/^[a-zA-Z0-9]*$/);
let passwordInput = document.getElementById("password");
passwordInput.addEventListener('keyup', checkpassword);

function checkpassword () {
    if(passwordRegEx.test(passwordInput.value)) {
        passwordInput.style.borderColor = "green";
        document.getElementById("validPassword").textContent="Valid password";
        return true;
    } else {
        passwordInput.style.borderColor = "red";
        document.getElementById("validPassword").textContent="Not a valid password";
        return false;
    }
}

// Password confirm
let passwordConfirmInput = document.getElementById("password-confirm");
passwordConfirmInput.addEventListener('keyup', checkpassword_confirm);

function checkpassword_confirm () {
    if(passwordConfirmInput.value === passwordInput.value) {
        passwordConfirmInput.style.borderColor = "green";
        document.getElementById("validConfirmPassword").textContent="Matches password above";
        return true;
    } else {
        passwordConfirmInput.style.borderColor = "red";
        document.getElementById("validConfirmPassword").textContent="Does not match password above";
        return false;
    }
}


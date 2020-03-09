console.log('js working');

function checkform(){
    checkname();
    checkpassword();
    checkConfirmpassword();
    return true;
}

//NAME
let nameRegEx = new RegExp(/^[a-z|A-Z|æøå|ÆØÅ]+(\s[a-z|A-Z|æøå|ÆØÅ]+){1,3}$/);
let nameInput = document.getElementById("name");
let nameInfo = document.getElementById("nameinfo");
nameInput.addEventListener('keyup', checkname);

function checkname () {
    if(nameRegEx.test(nameInput.value)) {
        console.log('cool name');
        nameInput.style.borderColor = "green";
        nameInfo.innerText = "";
        return true;
    } else {
        console.log('not so cool name');
        nameInput.style.borderColor = "red";
        nameInfo.innerText = "Name not valid - should be two or more words.";
        return false;
    }
}

//PASSWORD
let passwordRegEx = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/);
let passwordInput = document.getElementById("password");
let passwordInfo = document.getElementById("passwordinfo");
passwordInput.addEventListener('keyup', checkpassword);

function checkpassword () {
    if(passwordRegEx.test(passwordInput.value)) {
        console.log('cool password');
        passwordInput.style.borderColor = "green";
        passwordInfo.innerText = "";
        return true;
    } else {
        console.log('not so cool password');
        passwordInput.style.borderColor = "red";
        passwordInfo.innerText = "Password not valid - should contain 8 characters including lowercase letters, uppercase letters, numbers and special characters.";
        return false;
    }
}

//CONFIRM PASSWORD
let confirm_passwordInput = document.getElementById("confirm_password");
let confirm_passwordInfo = document.getElementById("confirm_passwordinfo");
confirm_passwordInput.addEventListener('keyup', checkConfirmpassword);

function checkConfirmpassword () {
    console.log('omgomgomg');
    if(passwordInput.value == confirm_passwordInput.value) {
        console.log('cool confirm password');
        confirm_passwordInput.style.borderColor = "green";
        confirm_passwordInfo.innerText = "";
        return true;
    } else {
        console.log('Passwords not matches');
        confirm_passwordInput.style.borderColor = "red";
        confirm_passwordInfo.innerText = "Passwords not matches";
        return false;
    }
}


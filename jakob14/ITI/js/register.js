console.log('js running');

function checkform(){
    checkname();
    checkpassword();
    checkemail();
    return false;
}

//PASSWORD
let passwordRegEx = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/);
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
        console.log('Not valid password');
        passwordInput.style.borderColor = "red";
        passwordInfo.innerText = "Password not valid - Must contain 8 characters including lowercase letters, uppercase letters and numbers.";
        return false;
    }
}
//EMAIL
let emailRegEx = new RegExp(/^\S+@\S+\.[a-z|A-Z]{2,10}$/);
let emailInput = document.getElementById("email");
let emailInfo = document.getElementById("emailinfo");
emailInput.addEventListener('keyup', checkemail);

function checkemail () {
    if(emailRegEx.test(emailInput.value)) {
        console.log('cool email');
        emailInput.style.borderColor = "green";
        emailInfo.innerText = "";
        return true;
    } else {
        console.log('Not a valid email');
        emailInput.style.borderColor = "red";
        emailInfo.innerText = "Email not valid - Should be something@domain.whatever";
        return false;
    }
}

//USERNAME
let nameRegEx = new RegExp(/^[a-zA-Z0-9]*$/);
let nameInput = document.getElementById("username");
let nameInfo = document.getElementById("usernameinfo");
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
        nameInfo.innerText = "Name not valid - No special characters.";
        return false;
    }
}




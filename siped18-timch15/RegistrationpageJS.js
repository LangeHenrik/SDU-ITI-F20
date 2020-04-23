
function checkForm() {
    checkFirstname();
    checkLastname();
    checkUsername();
    checkEmail();
    checkPassword();
    return true;
}

//Firstname 
let fnameRegEx = new RegExp(/[a-z]{1,10}/);
let fnameInput = document.getElementById("firstname");
let fnameInfo = document.getElementById("firstnameinfo");
fnameInput.addEventListener('keyup', checkFirstname);

function checkFirstname() {
    if(fnameRegEx.test(fnameInput.value)) {
        fnameInput.style.borderColor = "green";
        fnameInfo.innerText = "";
        return true;
    } else {
        fnameInput.style.borderColor = "red";
        fnameInfo.innerText = "You forgot to write you firstname";
        return false;
    }
}

//Lastname
let lnameRegEx = new RegExp(/[a-z]{1,10}/);
let lnameInput = document.getElementById("lastname");
let lnameInfo = document.getElementById("lastnameinfo");
lnameInput.addEventListener('keyup', checkLastname);

function checkLastname() {
    if(lnameRegEx.test(lnameInput.value)){
        lnameInput.style.borderColor = "green";
        lnameInfo.innerText = "";
        return true;
    } else {
        lnameInput.style.borderColor = "red";
        lnameInfo.innerText = "You fotget to write you lastname";
        return false;
    }
}
//Username
let usernameRegEx = new RegExp(/^[a-z0-9_-]{3,15}$/);
let usernameInput = document.getElementById("username");
let usernameInfo = document.getElementById("usernameinfo");
usernameInput.addEventListener('keyup', checkUsername);

function checkUsername() {
    if(usernameRegEx.test(usernameInput.value)){
        usernameInput.style.borderColor = "green";
        usernameInfo.innerText = "";
        return true;
    }else {
        usernameInput.style.borderColor = "red";
        usernameInfo.innerText = "Your username needs to be between 3 to 13 characters";
        return false;
    }
}

//Email
let emailRegEx = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
let emailInput = document.getElementById("email");
let emailInfo = document.getElementById("emailinfo");
emailInput.addEventListener('keyup', checkEmail);

function checkEmail() {
    if(emailRegEx.test(emailInput.value)) {
        emailInput.style.borderColor = "green";
        emailInfo.innerText = "";
        return true;
    } else {
        emailInput.style.borderColor = "red";
        emailInfo.innerText = "You forgot to write you email. Remember @";
        return false;
    }
}

//Password
let passwordRegEx = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/);
let passwordInput = document.getElementById("password");
let passwordInfo = document.getElementById("passwordinfo")
passwordInput.addEventListener('keyup', checkPassword);

function checkPassword() {
    if(passwordRegEx.test(passwordInput.value)){
        passwordInput.style.borderColor = "green";
        passwordInfo.innerText = "";
        return true;
    } else {
        passwordInput.style.borderColor = "red";
        passwordInfo.innerText = "Password not valid. You password should contain 8 characters including: lowercase letters, uppercase letters, numbers and special characters";
        return false;
    }
}

function saveuser(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("firstname").innerHTML = this.responseText;
            document.getElementById("lastname").innerHTML = this.responseText;
            document.getElementById("username").innerHTML = this.responseText;
            document.getElementById("email").innerHTML = this.responseText;
            document.getElementById("password").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "dbdata.php" + str, true);
    xmlhttp.send();
}

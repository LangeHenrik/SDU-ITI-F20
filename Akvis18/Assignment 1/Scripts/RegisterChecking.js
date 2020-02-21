console.log("Form validation");

let EmailInput = document.getElementById("email");
let Emailinfo = document.getElementById("email-info");
let UsernameInput = document.getElementById("username");
let Usernameinfo = document.getElementById("username-info");
let PasswordInput = document.getElementById("password");
let PasswordInfo = document.getElementById("password-info");
let SecondPasswordInput = document.getElementById("second-password");
let SecondPasswordInfo = document.getElementById("second-password-info");

let emailRegex = "";
let usernameRegex = "";
let passRegex = "";

function CheckElement(testElement, regexp, infoElement, errorText) {
    if (RegExp(regexp).test(testElement.value)){
        console.log("Cool" + testElement.id);
        testElement.style.borderColor = "green";
        infoElement.innerText = "";
        return true;
    }
    console.log("Not so cool" + testElement.id);
    testElement.style.borderColor = "red";
    infoElement.innerText = errorText;
    return false;
}

function CheckForm() {
    return CheckEmail && CheckUsername && CheckPass && CheckSecPassEqual;
}

function CheckEmail() {
//todo
    return CheckElement(EmailInput, emailRegex, Emailinfo, "Please enter a valid Email");
}

function CheckUsername() {
//todo evt. ajax, der tjekker om brugernavnet bliver brugt
    return CheckElement(EmailInput, usernameRegex, Emailinfo, "Please enter a valid Username");
}

function CheckPass() {
//todo
    return CheckElement(PasswordInput, passRegex, PasswordInfo, "");
}

function CheckSecPassEqual() {
//todo
    CheckElement(SecondPasswordInput, passRegex, SecondPasswordInfo, "");
}
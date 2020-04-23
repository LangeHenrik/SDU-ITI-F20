console.log("Form validation");

let UsernameInput = document.getElementById("username");
let UsernameInfo = document.getElementById("username-info");
let UsernameAvailability = document.getElementById("username-availability");
UsernameInput.addEventListener("keyup",CheckUsername);

let EmailInput = document.getElementById("email");
let EmailInfo = document.getElementById("email-info");
EmailInput.addEventListener("keyup", CheckEmail);

let PasswordInput = document.getElementById("password");
let PasswordInfo = document.getElementById("password-info");
PasswordInput.addEventListener("keyup",CheckPass);

let SecondPasswordInput = document.getElementById("second-password");
let SecondPasswordInfo = document.getElementById("second-password-info");
SecondPasswordInput.addEventListener("keyup",CheckSecPass);

let emailRegex = /^\S+@\S+\.[a-z|A-Z]{2,10}$/;
let usernameRegex =/^[A-Za-zÆØÅæøå _\-\d]{3,}$/;
let passRegex = /^(?=.*[a-zæøå])(?=.*[A-ZÆØÅ])(?=.*\d)(?=.*[@$!%*?&])[A-Za-zÆØÅæøå\d@$!%*?&]{8,}$/;

function CheckElement(testElement, regexp, infoElement, errorText) {
    if (RegExp(regexp).test(testElement.value)){
        console.log("Cool " + testElement.id);
        testElement.style.borderColor = "green";
        infoElement.innerText = "";
        return true;
    }
    console.log("Not so cool " + testElement.id);
    testElement.style.borderColor = "red";
    infoElement.innerText = errorText;
    return false;
}

function CheckElementsEqual(firstElement, secondElement, infoElement, errorMessage) {
    if (firstElement.value === secondElement.value){
        console.log("Elements match");
        infoElement.innerText = "";
        return true;
    }
    console.log("Elements don't match");
    infoElement.innerText = errorMessage;
    secondElement.style.borderColor = "red";
    return false;
}

function CheckForm() {
    return CheckEmail() && CheckUsername() && CheckPass() && CheckSecPass();
}

function CheckUsername() {
    UsernameAvailability.style.color = "white";
    let avalible = UsernameAvailable(UsernameInput.value);
    let valid = CheckElement(UsernameInput, usernameRegex, UsernameInfo, "Please enter a valid Username");
    return valid && avalible;
}

function CheckEmail() {
    return CheckElement(EmailInput, emailRegex, EmailInfo, "Please enter a valid Email");
}

function CheckPass() {
    return CheckElement(PasswordInput, passRegex, PasswordInfo, "Password Must be 8 characters long and contain atleast 1 lowercase, 1 Uppercase, 1 number and 1 of the following @$!%*?&");
}

function CheckSecPass() {
    let valid = CheckElement(SecondPasswordInput, passRegex, SecondPasswordInfo, "");
    let equal = CheckElementsEqual(PasswordInput, SecondPasswordInput, SecondPasswordInfo, "Passwords don't match");
    return valid && equal;
}

function ShowPass() {
    if (PasswordInput.type === "password") {
        PasswordInput.type = "text";
        SecondPasswordInput.type = "text";
    } else {
        PasswordInput.type = "password";
        SecondPasswordInput.type = "password";
    }
}


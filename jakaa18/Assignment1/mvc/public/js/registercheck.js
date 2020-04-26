console.log("Form validation");

let UsernameInput = document.getElementById("regUsernameId");
//TODO create info element to inform user of unavailable name
let UsernameInfo = document.getElementById("username-info");
let UsernameAvailability = document.getElementById("username-availability");
//if (UsernameInput){UsernameInput.addEventListener("keyup", CheckUsername);}

let PasswordInput = document.getElementById("regPassId");
//TODO create info element to inform user of unusable password
let PasswordInfo = document.getElementById("password-info");
//if (PasswordInput) {PasswordInput.addEventListener("keyup", CheckPass);}
let usernameRegex =/^[A-Za-zÆØÅæøå _\-\d]{3,}$/;
let passRegex = /^(?=.*[a-zæøå])(?=.*[A-ZÆØÅ])(?=.*\d)(?=.*[@$!%*?&])[A-Za-zÆØÅæøå\d]{8,}$/;


function checkRegEx(nameTest, regExp) {
    if (RegExp(regExp).test(nameTest.value)) {
        return true;
    } else {
        return false;
    }
}

function CheckRegister() {
    let usernameValue = document.getElementById("regUsernameId");
    let usernameRegex =/^[A-Za-zÆØÅæøå _\-\d]{3,}$/;
    let available = CheckUsername(usernameValue.value);
    let valid = checkRegEx(usernameValue, usernameRegex);
    return available && valid;
}

function CheckElement(testElement, regexp, infoElement, errorText) {
    if (RegExp(regexp).test(testElement.value)){
        console.log("Element works " + testElement.id);
        testElement.style.borderColor = "green";
        infoElement.innerText = "";
        console.log("this is true");
        return true;
    }
    console.log("Element is not satisfactory " + testElement.id);
    testElement.style.borderColor = "red";
    infoElement.innerText = errorText;
    return false;
}

function CheckForm() {
    if (CheckUsername() && CheckPass()){
        return true;
    } else {
        return false;
    }
}

function CompleteRegistration($username, $password){
    let temp = CheckForm();
    console.log(temp);
    if (temp == true){
        let xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "/Assignment1/mvc/public/register/createUser/" + $username + "/" + $password, false);
            xmlhttp.send();

        return true;
    } else {
        return false;
    }
}

function CheckUsername() {

    let UsernameInput = document.getElementById("regUsernameId");
//TODO create info element to inform user of unavailable name
    let UsernameInfo = document.getElementById("username-info");
    let UsernameAvailability = document.getElementById("username-availability");

    let available;
    let valid;
    if(UsernameAvailability){UsernameAvailability.style.color = "white";}
    if(UsernameInput) {
        available = UsernameAvailable(UsernameInput.value);
        console.log(available);
        valid = CheckElement(UsernameInput, usernameRegex, UsernameInfo, "Please enter a valid Username");
        console.log(valid);
    }
    if (valid && available){
        console.log("AAARGH");
        return true;
    } else {
        return false;
    }
}

function CheckPass() {

    let PasswordInput = document.getElementById("regPassId");
//TODO create info element to inform user of unusable password
    let PasswordInfo = document.getElementById("password-info");
    //if (PasswordInput) {PasswordInput.addEventListener("keyup", CheckPass);}
    let passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    return CheckElement(PasswordInput, passRegex, PasswordInfo, "Password Must be 8 characters long and contain at least 1 lowercase, 1 Uppercase, and 1 number");
}
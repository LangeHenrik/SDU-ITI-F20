console.log("Form validation");

let UsernameInput = document.getElementById("regUsernameId");
//TODO create info element to inform user of unavailable name
let UsernameInfo = document.getElementById("username-info");
let UsernameAvailability = document.getElementById("username-availability");
UsernameInput.addEventListener("keyup",CheckUsername);

let PasswordInput = document.getElementById("regPassId");
//TODO create info element to inform user of unusable password
let PasswordInfo = document.getElementById("password-info");
PasswordInput.addEventListener("keyup",CheckPass);

let usernameRegex =/^[A-Za-zÆØÅæøå _\-\d]{3,}$/;
let passRegex = /^(?=.*[a-zæøå])(?=.*[A-ZÆØÅ])(?=.*\d)(?=.*[@$!%*?&])[A-Za-zÆØÅæøå\d]{8,}$/;

function CheckElement(testElement, regexp, infoElement, errorText) {
    if (RegExp(regexp).test(testElement.value)){
        console.log("Element works " + testElement.id);
        testElement.style.borderColor = "green";
        infoElement.innerText = "";
        return true;
    }
    console.log("Element is not satisfactory " + testElement.id);
    testElement.style.borderColor = "red";
    infoElement.innerText = errorText;
    return false;
}

function CheckForm() {
    return CheckUsername() && CheckPass(); //Needs to return 3 trues
}

function CheckUsername() {
    UsernameAvailability.style.color = "white";
    let available = UsernameAvailable(UsernameInput.value);
    let valid = CheckElement(UsernameInput, usernameRegex, UsernameInfo, "Please enter a valid Username");
    return valid && available;
}

function CheckPass() {
    return CheckElement(PasswordInput, passRegex, PasswordInfo, "Password Must be 8 characters long and contain at least 1 lowercase, 1 Uppercase, and 1 number");
}
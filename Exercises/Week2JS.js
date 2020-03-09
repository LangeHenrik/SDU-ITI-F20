console.log('js working');

function checkform(){
    checkname();
    checkpassword();
    checkphone();
    checkemail();
    checkzip();
    return false;
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

//PHONE
let phoneRegEx = new RegExp(/^\+(\d){8,25}$/);
let phoneInput = document.getElementById("phone");
let phoneInfo = document.getElementById("phoneinfo");
phoneInput.addEventListener('keyup', checkphone);

function checkphone () {
    if(phoneRegEx.test(phoneInput.value)) {
        console.log('cool phone');
        phoneInput.style.borderColor = "green";
        phoneInfo.innerText = "";
        return true;
    } else {
        console.log('not so cool phone');
        phoneInput.style.borderColor = "red";
        phoneInfo.innerText = "Phone not valid - should be a + followed by 8 - 25 digits.";
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
        console.log('not so cool email');
        emailInput.style.borderColor = "red";
        emailInfo.innerText = "Email not valid - should have the form some@email.whatever";
        return false;
    }
}

//ZIP
let zipRegEx = new RegExp(/^\d{4}$/);
let zipInput = document.getElementById("zip");
let zipInfo = document.getElementById("zipinfo");
zipInput.addEventListener('keyup', checkzip);

function checkzip () {
    if(zipRegEx.test(zipInput.value)) {
        console.log('cool zip');
        zipInput.style.borderColor = "green";
        zipInfo.innerText = "";
        return true;
    } else {
        console.log('not so cool zip');
        zipInput.style.borderColor = "red";
        zipInfo.innerText = "Zip not valid - should be exactly 4 digits";
        return false;
    }
}



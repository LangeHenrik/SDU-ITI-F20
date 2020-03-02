function checkform(){
    checkfuldname();
    checknewusername();
    checknewpassword();
    checkphone();
    checkemail();
    checkzip();
    return false;
}

//fuldname
let fuldnameRegEx = new RegExp(/^[a-z|A-Z|æøå|ÆØÅ|-]+(\s[a-z|A-Z|æøå|ÆØÅ|-]+){1,3}$/);
let fuldnameInput = document.getElementById("fuldname");
let fuldnameInfo = document.getElementById("fuldnameinfo");
fuldnameInput.addEventListener('keyup', checkfuldname);

function checkfuldname () {
    if(fuldnameRegEx.test(fuldnameInput.value)) {
        console.log('Valid fuldname');
        fuldnameInput.style.borderColor = "green";
        fuldnameInfo.innerText = "";
        return true;
    } else {
        console.log('Not valid fuldname');
        fuldnameInput.style.borderColor = "red";
        fuldnameInfo.innerText = "Not valid - \nShould be betwen 2 and 4 words. (a-å, A-Å, 0-9, -)";
        return false;
    }
}

// Username
let newusernameRegEx = new RegExp(/^[a-z|A-Z|0-9]{5,10}$/);
let newusernameInput = document.getElementById("newusername");
let newusernameInfo = document.getElementById("newusernameinfo");
newusernameInput.addEventListener('keyup', checknewusername);

function checknewusername () {
    if(newusernameRegEx.test(newusernameInput.value)) {
        console.log('Valid username');
        newusernameInput.style.borderColor = "green";
        newusernameInfo.innerText = "";
        return true;
    } else {
        console.log('Not valid Username');
        newusernameInput.style.borderColor = "red";
        newusernameInfo.innerText = "Not valid - \nShould be betwen 5 to 10 characters. (a-z, A-Z, 0-9)";
        return false;
    }
}

//Password
let newpasswordRegEx = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\.\,])[A-Za-z\d@$!%*?&\.\,]{8,}$/);
let newpasswordInput = document.getElementById("newpassword");
let newpasswordInfo = document.getElementById("newpasswordinfo");
newpasswordInput.addEventListener('keyup', checknewpassword);

function checknewpassword () {
    if(newpasswordRegEx.test(newpasswordInput.value)) {
        console.log('Valid password');
        newpasswordInput.style.borderColor = "green";
        newpasswordInfo.innerText = "";
        return true;
    } else {
        console.log('Not valid password');
        newpasswordInput.style.borderColor = "red";
        newpasswordInfo.innerText = "Password not valid - \nShould be at least 8 character containing a lowercase letter, \na uppercase letters, a anumber, and a special character  (  @ $ ! % * ? & , .  ).";
        return false;
    }
}

//Phone
let phoneRegEx = new RegExp(/^\+(\d){8,25}$/);
let phoneInput = document.getElementById("phone");
let phoneInfo = document.getElementById("phoneinfo");
phoneInput.addEventListener('keyup', checkphone);

function checkphone () {
    if(phoneRegEx.test(phoneInput.value)) {
        console.log('Valid phone');
        phoneInput.style.borderColor = "green";
        phoneInfo.innerText = "";
        return true;
    } else {
        console.log('Not valid phone');
        phoneInput.style.borderColor = "red";
        phoneInfo.innerText = "Phone not valid - \nshould be a + followed by 8 - 25 digits.";
        return false;
    }
}

//Email
let emailRegEx = new RegExp(/^\S+@\S+\.[a-z|A-Z]{2,10}$/);
let emailInput = document.getElementById("email");
let emailInfo = document.getElementById("emailinfo");
emailInput.addEventListener('keyup', checkemail);

function checkemail () {
    if(emailRegEx.test(emailInput.value)) {
        console.log('Valid email');
        emailInput.style.borderColor = "green";
        emailInfo.innerText = "";
        return true;
    } else {
        console.log('Not valid email');
        emailInput.style.borderColor = "red";
        emailInfo.innerText = "Email not valid - should have the form some@email.whatever";
        return false;
    }
}

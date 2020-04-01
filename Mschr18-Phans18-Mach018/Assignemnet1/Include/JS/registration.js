function checkform(){
    $returnBool = ( document.getElementById("newusernamevalid").innerText == "")
                  // to validate that username not is in database from
    $returnBool = checkfullname() && $returnBool;
    $returnBool = checknewusername() && $returnBool;
    $returnBool = checknewpassword() && $returnBool;
    $returnBool = checkphone() && $returnBool;
    return checkemail() && $returnBool;
}

//fullname
let fullnameRegEx = new RegExp(/^[a-z|A-Z|æøå|ÆØÅ|-]+(\s[a-z|A-Z|æøå|ÆØÅ|-]+){1,3}$/);
let fullnameInput = document.getElementById("fullname");
let fullnameValid = document.getElementById("fullnamevalid");
let fullnameInfo = document.getElementById("fullnameinfo");
fullnameInput.addEventListener('keyup', checkfullname);

function checkfullname () {
    if(fullnameRegEx.test(fullnameInput.value)) {
        console.log('Valid fullname');
        fullnameValid.innerText = "";
        fullnameInput.style.backgroundColor = "#FFF";
        fullnameInfo.innerText = "";
        return true;
    } else {
        console.log('Not valid fullname');
        fullnameValid.innerText = "Not Valid !";
        fullnameInput.style.backgroundColor = "#FBB";
        fullnameInfo.innerText = "Should be betwen 2 and 4 words. (a-å, A-Å, 0-9, -)";
        return false;
    }
}

// Username
let newusernameRegEx = new RegExp(/^[a-z|A-Z|0-9]{5,10}$/);
let newusernameInput = document.getElementById("newusername");
let newusernameValid = document.getElementById("newusernamevalid");
let newusernameInfo = document.getElementById("newusernameinfo");
newusernameInput.addEventListener('keyup', checknewusername);

function checknewusername () {
    if(newusernameRegEx.test(newusernameInput.value)) {
        console.log('Valid username');
        newusernameValid.innerText = "";
        newusernameInput.style.backgroundColor = "#FFF";
        newusernameInfo.innerText = "";
        isUsernameAvailabil();
        return true;
    } else {
        console.log('Not valid Username');
        newusernameValid.innerText = "Not Valid !";
        newusernameInput.style.backgroundColor = "#FBB";
        newusernameInfo.innerText = "Should be betwen 5 to 10 characters. (a-z, A-Z, 0-9)";
        return false;
    }
}


function isUsernameAvailabil() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          if (this.responseText === "exists") {
            newusernameValid.innerText = "Not available !";
            newusernameInfo.innerText = "";
            newusernameInput.style.backgroundColor = "#FBB";
            console.log(' - username not available');
            //signupButton.disabled = true;
          } else {
            newusernameValid.innerText = "";
            newusernameInput.style.backgroundColor = "#FFF";
            newusernameInfo.innerText = "";
            console.log(' - username available');
            //signupButton.disabled = false;
          }
        }
    };
    xmlhttp.open("GET", "Include/PDO/isUsernameAvailabil.php?newusername=" + newusernameInput.value  , true);
    xmlhttp.send();
}





//Password
let newpasswordRegEx = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\.\,])[A-Za-z\d@$!%*?&\.\,]{8,}$/);
let newpasswordInput = document.getElementById("newpassword");
let newpasswordValid = document.getElementById("newpasswordvalid");
let newpasswordInfo = document.getElementById("newpasswordinfo");
newpasswordInput.addEventListener('keyup', checknewpassword);

function checknewpassword () {
    if(newpasswordRegEx.test(newpasswordInput.value)) {
        console.log('Valid password');
        newpasswordValid.innerText = "";
        newpasswordInput.style.backgroundColor = "#FFF";
        newpasswordInfo.innerText = "";
        return true;
    } else {
        console.log('Not valid password');
        newpasswordValid.innerText = "Not Valid !";
        newpasswordInput.style.backgroundColor = "#FBB";
        newpasswordInfo.innerText = "Should be at least 8 character containing a lowercase letter, \na uppercase letters, a anumber, and a special character  (  @ $ ! % * ? & , .  ).";
        return false;
    }
}

//Phone
let phoneRegEx = new RegExp(/^\+(\d){8,25}$/);
let phoneInput = document.getElementById("phone");
let phoneValid = document.getElementById("phonevalid");
let phoneInfo = document.getElementById("phoneinfo");
phoneInput.addEventListener('keyup', checkphone);

function checkphone () {
    if(phoneRegEx.test(phoneInput.value)) {
        console.log('Valid phone');
        phoneValid.innerText = "";
        phoneInput.style.backgroundColor = "#FFF";
        phoneInfo.innerText = "";
        return true;
    } else {
        console.log('Not valid phone');
        phoneValid.innerText = "Not Valid !";
        phoneInput.style.backgroundColor = "#FBB";
        phoneInfo.innerText = "Should be a + followed by 8 - 25 digits.";
        return false;
    }
}

//Email
let emailRegEx = new RegExp(/^\S+@\S+\.[a-z|A-Z]{2,10}$/);
let emailInput = document.getElementById("email");
let emailValid = document.getElementById("emailvalid");
let emailInfo = document.getElementById("emailinfo");emailvalid
emailInput.addEventListener('keyup', checkemail);

function checkemail () {
    if(emailRegEx.test(emailInput.value)) {
        console.log('Valid email');
        emailValid.innerText = "";
        emailInput.style.backgroundColor = "#FFF";
        emailInfo.innerText = "";
        return true;
    } else {
        console.log('Not valid email');
        emailValid.innerText = "Not Valid !";
        emailInput.style.backgroundColor = "#FBB";
        emailInfo.innerText = "Should have the form some@email.whatever";
        return false;
    }

}

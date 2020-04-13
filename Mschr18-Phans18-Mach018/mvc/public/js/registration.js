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
let fullnameInvalidTxt = document.getElementById("fullname-invalid-txt");
fullnameInput.addEventListener('keyup', checkfullname);

function checkfullname () {
  if (fullnameInput.value.length == 0)  {
      console.log('clear full name');
      fullnameInput.classList.remove("is-invalid");
      fullnameInput.classList.remove("is-valid");
      return false;
  }
  else if (fullnameRegEx.test(fullnameInput.value.trim())) {
      console.log('Valid full name');
      fullnameInput.classList.remove("is-invalid");
      fullnameInput.classList.add("is-valid");
      return true;
  }
  else {
      console.log('Not valid full name');
      fullnameInput.classList.add("is-invalid");
      fullnameInput.classList.remove("is-valid");
      fullnameInvalidTxt.innerText = "Sorry you´r full name is not valid."
      //fullnameInfo.innerText = "Should be betwen 2 and 4 words. (a-å, A-Å, -)";
      return false;
  }
}

// Username
let newusernameRegEx = new RegExp(/^[a-z|A-Z|0-9]{5,10}$/);
let newusernameInput = document.getElementById("newusername");
let usernameInvalidTxt = document.getElementById("username-invalid-txt");
newusernameInput.addEventListener('keyup', checknewusername);

function checknewusername () {
  if (newusernameInput.value.length == 0)  {
      console.log('clear username');
      newusernameInput.classList.remove("is-invalid");
      newusernameInput.classList.remove("is-valid");
      return false;
  }
  else if(newusernameRegEx.test(newusernameInput.value.trim())) {
        console.log('Valid username');
        newusernameInput.classList.remove("is-invalid");
        newusernameInput.classList.remove("is-valid");
        isUsernameAvailabil();
        return true;
  } else {
      console.log('Not valid username');
      newusernameInput.classList.add("is-invalid");
      newusernameInput.classList.remove("is-valid");
      usernameInvalidTxt.innerText = "Sorry you´r usernamer is not valid."
      //newusernameInfo.innerText = "Should be betwen 5 to 10 characters. (a-z, A-Z, 0-9)";
      return false;
  }
}

function isUsernameAvailabil() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          if (this.responseText === "exists") {

            newusernameInput.classList.add("is-invalid");
            usernameInvalidTxt.innerText = "Sorry that usernamer is not available."
            console.log(' - username not available');
            //signupButton.disabled = true;
          } else {
            newusernameInput.classList.add("is-valid");
            console.log(' - username available');
            //signupButton.disabled = false;
          }
        }
    };
    xmlhttp.open("GET", "/Mschr18-Phans18-Mach018/mvc/public/user/usernameAvailable/?newusername=" + newusernameInput.value  , true);
    xmlhttp.send();
}





//Password
let newpasswordRegEx = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\.\,])[A-Za-z\d@$!%*?&\.\,]{8,}$/);
let newpasswordInput = document.getElementById("newpassword");
let passwordInvalidTxt = document.getElementById("password-invalid-txt");
newpasswordInput.addEventListener('keyup', checknewpassword);

function checknewpassword () {
  if (newpasswordInput.value.length == 0)  {
      console.log('clear password');
      newpasswordInput.classList.remove("is-invalid");
      newpasswordInput.classList.remove("is-valid");
      return false;
  }
  else if (newpasswordRegEx.test(newpasswordInput.value.trim())) {
      console.log('Valid password');
      newpasswordInput.classList.remove("is-invalid");
      newpasswordInput.classList.add("is-valid");
      return true;
  }
  else {
      console.log('Not valid password');
      newpasswordInput.classList.add("is-invalid");
      newpasswordInput.classList.remove("is-valid");
      passwordInvalidTxt.innerText = "Sorry you´r password is not valid."
      //newpasswordInfo.innerText = "Should be at least 8 character containing a lowercase letter, \na uppercase letters, a anumber, and a special character  (  @ $ ! % * ? & , .  ).";
      return false;
  }
}

let fas = document.getElementById("toggle-fas-eye");
let controltype = document.getElementById("newpassword");

function toggleviewpassword() {
  if (fas.classList.contains("fa-eye-slash")) {
    fas.classList.remove("fa-eye-slash");
    fas.classList.add("fa-eye");
    controltype.type = "text";
  } else {
    fas.classList.add("fa-eye-slash");
    fas.classList.remove("fa-eye");
    controltype.type = "password";
  }
}

//Phone
let phoneRegEx = new RegExp(/^\+(\d){8,25}$/);
let phoneInput = document.getElementById("phone");
let phoneInvalidTxt = document.getElementById("phone-invalid-txt");
phoneInput.addEventListener('keyup', checkphone);

function checkphone () {
  if (phoneInput.value.length == 0)  {
      console.log('clear phone number');
      phoneInput.classList.remove("is-invalid");
      phoneInput.classList.remove("is-valid");
      return false;
  }
  else if (phoneRegEx.test(phoneInput.value.replace(/ /g,''))) {
      console.log('Valid phone number');
      phoneInput.classList.remove("is-invalid");
      phoneInput.classList.add("is-valid");
      return true;
  }
  else {
      console.log('Not valid phone number');
      phoneInput.classList.add("is-invalid");
      phoneInput.classList.remove("is-valid");
      phoneInvalidTxt.innerText = "Sorry you´r phone number is not valid."
      //phoneInfo.innerText = "Should be a + followed by 8 - 25 digits.";
      return false;
  }
}

//Email
let emailRegEx = new RegExp(/^\S+@\S+\.[a-z|A-Z]{2,10}$/);
let emailInput = document.getElementById("email");
let emailInvalidTxt = document.getElementById("email-invalid-txt");
emailInput.addEventListener('keyup', checkemail);

function checkemail () {
  if (emailInput.value.length == 0)  {
      console.log('clear email');
      emailInput.classList.remove("is-invalid");
      emailInput.classList.remove("is-valid");
      return false;
  }
  else if (emailRegEx.test(emailInput.value.trim())) {
      console.log('Valid email');
      emailInput.classList.remove("is-invalid");
      emailInput.classList.add("is-valid");
      return true;
  }
  else {
      console.log('Not valid email');
      emailInput.classList.add("is-invalid");
      emailInput.classList.remove("is-valid");
      emailInvalidTxt.innerText = "Sorry you´r email is not valid."
      //emailInfo.innerText = "Should have the form some@email.whatever";
      return false;
  }

}

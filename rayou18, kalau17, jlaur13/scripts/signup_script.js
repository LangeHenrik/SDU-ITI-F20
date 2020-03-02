


var passwordRegex = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm);
var usernameRegex = new RegExp(/\w{3,}/g);

var usernameInput = document.getElementById("usernameInput");
var passwordInput = document.getElementById("passwordInput");
var repeatPasswordInput = document.getElementById("repeatPasswordInput");
var usernameIsSet = false;
var passwordIsSet = false;
var repeatPasswordIsSet = false;
var sumbmitBtn = document.getElementById("signup_btn");

sumbmitBtn.disabled=true;


function program(){
  regexInputCheck(usernameRegex,document.getElementById("usernameInput"));
  regexInputCheck(passwordRegex, document.getElementById("passwordInput"));
  isPasswordEqual(passwordInput.value,repeatPasswordInput.value);
  if(usernameIsSet && passwordIsSet && repeatPasswordIsSet){
    sumbmitBtn.disabled=false;
  }
}






function isPasswordEqual(password1, password2){
if(repeatPasswordInput.value != ""){
  if(password1 == password2){
    repeatPasswordInput.style.borderColor ="green";
    repeatPasswordInput.style.borderWidth  ="3px";
    repeatPasswordIsSet = true;
    return true;
  }
  else{
    repeatPasswordInput.style.borderColor ="red";
    repeatPasswordInput.style.borderWidth  ="3px";
    repeatPasswordIsSet = false;
    return false;
  }
}
else{return false;}
}

function regexInputCheck(regExp, input){
  if(regExp.test(input.value)){
    input.style.borderColor ="green";
    input.style.borderWidth  ="3px";
    (input== document.getElementById("usernameInput")) ? usernameIsSet=true :passwordIsSet=true;
    return true;
  }
  if(regExp.test(input.value)==false){  //else wouldnt work
    input.style.borderColor ="red";
    input.style.borderWidth  ="3px";
    (input== document.getElementById("usernameInput")) ? usernameIsSet=false :passwordIsSet=false;
    return false;
  }
}

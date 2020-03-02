


var passwordRegex = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm);
var usernameRegex = new RegExp(/\w{3,}/g);

var usernameInput = document.getElementById("usernameInput");
var passwordInput = document.getElementById("passwordInput");
var repeatPasswordInput = document.getElementById("repeatPasswordInput");
var usernameIsSet = false;
var passwordIsSet = false;
var repeatPasswordIsSet = false;
var sumbmitBtn = document.getElementById("signup_btn");
function checkPassword(){


/*  if(usernameIsSet && passwordIsSet && repeatPasswordIsSet){
  sumbmitBtn.disabled = false;
  console.log("set to false");
  }
  else {
    sumbmitBtn.disabled = true;
  } */

/*  if(usernameRegex.test(usernameInput.value)){
    usernameInput.style.borderColor ="green";
    usernameInput.style.borderWidth  ="3px";
    usernameIsSet = true;
      return false;
  }
  if(usernameRegex.test(usernameInput.value)==false){
    usernameInput.style.borderColor ="red";
    usernameInput.style.borderWidth  ="3px";
    usernameIsSet = false;
      return false;
  }
  if(passwordRegex.test(passwordInput.value)){
      passwordInput.style.borderColor ="green";
      passwordInput.style.borderWidth  ="3px";
      passwordIsSet = true;
      return false;
  }
  if(passwordRegex.test(passwordInput.value)==false){
      passwordInput.style.borderColor ="red";
      passwordInput.style.borderWidth  ="3px";
      passwordIsSet = false;
      return false;
  } */

  if(repeatPasswordInput.value!="" && repeatPasswordInput.value == passwordInput.value){
    repeatPasswordInput.style.borderColor ="green";
    repeatPasswordInput.style.borderWidth  ="3px";
    repeatPasswordIsSet = true;
    return false;
  }
  if(repeatPasswordInput.value!="" && repeatPasswordInput.value != passwordInput.value){
    repeatPasswordInput.style.borderColor ="red";
    repeatPasswordInput.style.borderWidth  ="3px";
    repeatPasswordIsSet = false;
    return false;
  }

}

function regexInputCheck(regExp, input){
console.log("regexInputCheck");
  if(regExp.test(input.value)){
    input.style.borderColor ="green";
    input.style.borderWidth  ="3px";
    console.log("true");
    return false;
  }
  if(regExp.test(input.value)==false){  //else wouldnt work
    input.style.borderColor ="red";
    input.style.borderWidth  ="3px";
    console.log("false");
    return false;
  }
}

function program(){
  console.log("program");
  regexInputCheck(usernameRegex,document.getElementById("usernameInput"));
  regexInputCheck(passwordRegex, document.getElementById("passwordInput"));
}

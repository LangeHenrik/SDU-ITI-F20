


var passwordRegex = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm);
var usernameRegex = new RegExp(/\w{3,}/g);
function checkPassword(){
  var usernameInput = document.getElementById("usernameInput");
  var passwordInput = document.getElementById("passwordInput");
  var repeatPasswordInput = document.getElementById("repeatPasswordInput");
  var usernameIsSet = false;
  var passwordIsSet = false;
  var repatPasswordIsSet = false;
  var sumbmitBtn = document.getElementById("signup_btn");


  if(usernameRegex.test(usernameInput.value)){
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
  }

  if(repeatPasswordInput.value!="" && repeatPasswordInput.value == passwordInput.value){
    repeatPasswordInput.style.borderColor ="green";
    repeatPasswordInput.style.borderWidth  ="3px";
    repatPasswordIsSet = true;
    return false;
  }
  if(repeatPasswordInput.value!="" && repeatPasswordInput.value != passwordInput.value){
    repeatPasswordInput.style.borderColor ="red";
    repeatPasswordInput.style.borderWidth  ="3px";
    repatPasswordIsSet = false;
    return false;
  }

if(usernameIsSet && passwordIsSet && repatPasswordIsSet){
sumbmitBtn.disabled = false;
}
else {
  sumbmitBtn.disabled = true;
}



}

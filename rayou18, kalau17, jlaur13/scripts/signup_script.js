


var passwordRegex = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm);

function checkPassword(){
  var usernameInput = document.getElementById("usernameInput");
  var passwordInput = document.getElementById("passwordInput");
  var repeatPasswordInput = document.getElementById("repeatPasswordInput");

  if(usernameInput.value != ""){
    usernameInput.style.borderColor ="green";
    usernameInput.style.borderWidth  ="3px";
  }
  if(passwordRegex.test(passwordInput.value)){
      passwordInput.style.borderColor ="green";
      passwordInput.style.borderWidth  ="3px";
      return false;
  }
  if(passwordRegex.test(passwordInput.value)==false){
      passwordInput.style.borderColor ="red";
      passwordInput.style.borderWidth  ="3px";
      return false;
  }

  if(repeatPasswordInput.value!="" &&repeatPasswordInput.value == passwordInput.value){
    repeatPasswordInput.style.borderColor ="green";
    repeatPasswordInput.style.borderWidth  ="3px";
    return false;
  }
  if(repeatPasswordInput.value!="" &&repeatPasswordInput.value != passwordInput.value){
    repeatPasswordInput.style.borderColor ="red";
    repeatPasswordInput.style.borderWidth  ="3px";
    return false;
  }


}

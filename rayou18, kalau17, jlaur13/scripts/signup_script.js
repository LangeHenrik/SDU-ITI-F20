var usernameInput = document.getElementById("usernameInput");
var passwordInput = document.getElementById("passwordInput");
var repeatPasswordInput = document.getElementById("repeatPasswordInput");


function checkPassword(){
  if(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/g.test(usernameInput.value)){
    usernameInput.style.borderColor ="green";
  }
  else{
    usernameInput.style.borderColor ="red";
  }
}

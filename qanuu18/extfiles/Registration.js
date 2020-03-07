console.log('javascript is running');

function checkallforms(){
checkusername();
checkpassword();
return false;
}

//Username
let usernameRegEx = new RegExp(/^[a-z|A-Z|0-9]{4,13}$/);
let usernameInput = document.getElementById("username");
let usernameInfo = document.getElementById("usernameinfo");
usernameInput.addEventListener('keyup', checkusername);

function checkusername(){

if(usernameRegEx.test(usernameInput.value)){
console.log('Valid Username entered');
usernameInput.style.borderColor = "green";
usernameInfo.innerText = "";
return true;
} else {
console.log('Invalid Username entered');
usernameInput.style.borderColor = "red";
usernameInfo.innerText = "Username Invalid Must be 4-13 letters.";
}
}


//Password

let passwordRegEx = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/);
let passwordInput = document.getElementById("password");
let passwordInfo = document.getElementById("passwordinfo");
passwordInput.addEventListener('keyup', checkpassword);

function checkpassword(){

if(passwordRegEx.test(passwordInput.value)){
console.log('Valid Password entered');
passwordInput.style.borderColor = "green";
passwordInfo.innerText = "";
return true;
} else {
console.log('Invalid Password entered');
passwordInput.style.borderColor = "red";
passwordInfo.innerText = "Password Invalid Must contain 6 characters with uppercase,lowercase letters. numbers and special characters ex ( @,$,€)";
}
}



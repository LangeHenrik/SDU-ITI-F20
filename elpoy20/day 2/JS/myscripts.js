console.log("JS WORKING");

function checkpassword() {
var password = document.getElementById("password").value;

if(password.length < 8)
{ alert("Password must be at least 8 characters");
  return false;
}
else {
  alert("Password OK");
  return true; }
}

/*
else if (regex.test(regexName)) {
  alert("vous devez saisir deux noms")
}
*/

function checkname() {

var name = document.getElementById("name").value;
var matches = /[a-zA-Z]+\s+[a-zA-Z]+/g;

if(matches.test(name))
{ alert("Name OK");
  return true;
}
else {
  alert("your name must have 2 words or more");
  return false; }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this tesmplate file, choose Tools | Templates
 * and open the template in the editor.
 */

console.log("js loaded UPDATED");

function checkfield(){    
    return validateUsername() && validatePassword();
    /*
    if (validateUsername() && validatePassword()){
        return false;
    } else {
        return false;
    }*/
}
function validateUsername(){
    
    var usernameregex = new RegExp(/^[a-zA-Z0-9]{4}$/);
    console.log("...");
    var username = document.getElementById("username").value;
    console.log(username);
    
    if (usernameregex.test(username)){
        console.log("incorrect username form typed in please use letters and numbers");
        return false;
    } else if (username === ""){
        console.log("please insert username before submitting");
        return false;
    } else {
        console.log("username true");
        return true;
    }
    return false;
}
function validatePassword() {
    var passregex = new RegExp(/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,20})/);
    var password = document.getElementById("password").value;
    if (passregex.test(password)){
        console.log("incorrect password type please try again");
        return false;
    } else if (password === ""){
        console.log("password needs to be typed in");
        return false;
    } else {
        console.log("password true");
        return true;
    }
}

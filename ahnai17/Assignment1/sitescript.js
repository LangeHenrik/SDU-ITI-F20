/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function checkfield(){
    if (validateUsername()===true && validatePassword()===true){
        return true;
    } else {
        return false;
    }
}
function validateUsername(){
    var usernameregex = new regex("/^[a-zA-Z0-9]+$/");
    if (usernameregex.test(document.Inputform.Username===false)){
        alert("incorrect username form typed in please use letters and numbers");
        return false;
    } else if (document.Inputform.Username===""){
        alert("please insert username before submitting");
        return false;
    } else {
        return true;
    }
}
function validatePassword() {
    var passregex = new regex("((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,20})");
    if (passregex.test(document.Inputform.PAssword===false)){
        alert("incorrect password type please try again");
        return false;
    } else if (document.Inputform.PAssword===""){
        alert("password needs to be typed in");
        return false;
    } else {
        return true;
    }
}

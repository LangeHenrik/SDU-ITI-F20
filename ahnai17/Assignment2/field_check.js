function checkfield(){    
    return validateUsername() && validatePassword();
}
function validateUsername(){
    
    var usernameregex = new RegExp(/^[a-zA-Z0-9]{4}$/);
    console.log("...");
    var username = document.getElementById("username").value;
    console.log(username);
    
    if (usernameregex.test(username)){
        alert("incorrect username form typed in please use letters and numbers");
        return false;
    } else if (username === ""){
        alert("please insert username before submitting");
        return false;
    } else {
        alert("username is acceptable");
        return true;
    }
    return false;
}
function validatePassword() {
    var passregex = new RegExp(/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,1000})/);
    var password = document.getElementById("password").value;
    if (passregex.test(password)){
        alert("incorrect password type please try again");
        return false;
    } else if (password === ""){
        alert("password needs to be typed in");
        return false;
    } else {
        alert("password is acceptable");
        return true;
    }
}

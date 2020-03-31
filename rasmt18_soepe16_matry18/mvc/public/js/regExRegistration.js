function checkFields()
{
    var button = document.getElementById('submit');
    button.disabled = true;

    var usernamecheck = false;
    var passwordcheck = false;

    var testUsername = document.getElementById('username').value;
    var regex = new RegExp(/(?!.*[\.\-\_]{2,})^[a-zA-Z0-9\.\-\_]{3,24}$/gm); //Minimum length (3). Maximum length(24). Can only contain alphanumeric characters and the following special characters: dot (.), underscore(_) and dash (-). The special characters cannot appear more than once consecutively or combined. 
    if(regex.test(testUsername)){

        document.getElementById('username').style.color = "green";
        document.getElementById('usernameStatus').innerHTML = "";
        console.log("username is ok");
        usernamecheck = true;
        
    } else {
        document.getElementById('username').style.color = "red";
        document.getElementById('usernameStatus').innerHTML = "Minimum length (3).<br>Maximum length(24).<br>Can only contain alphanumeric characters and the following special characters: dot (.), underscore(_) and dash (-). The special characters cannot appear more than once consecutively or combined.";
        console.log("Minimum length (3).\nMaximum length(24).\nCan only contain alphanumeric characters and the following special characters: dot (.), underscore(_) and dash (-). The special characters cannot appear more than once consecutively or combined.");
    }
    var testPassword = document.getElementById('password').value;
    //Contains 8 or more chars
    //At least one lower case char 
    //At least one upper case char
    //At least one number
    var regex = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm); 
    if(regex.test(testPassword)){

        document.getElementById('password').style.color = "green";
        document.getElementById('passwordStatus').innerHTML = "";
        console.log("password is ok");
        passwordcheck = true;
        
    } else {
        document.getElementById('password').style.color = "red";
        document.getElementById('passwordStatus').innerHTML = "Password must contain 8 or more characters.<br>At least one lower case character.<br>At least one upper case character.<br>At least one number.";
        console.log("Password must contain 8 or more characters.\nAt least one lower case character.\nAt least one upper case character.\nAt least one number.");
    
    }

    var password = document.getElementById('password').value;
    var password2 = document.getElementById('password2').value;

    if (password != password2) {
        document.getElementById('password2').style.color = "red";
        document.getElementById('password2Status').innerHTML = "Passwords must match";
        console.log("Passwords does not match!");
        return false;
    } else {
        document.getElementById('password2').style.color = "green";
        document.getElementById('password2Status').innerHTML = '';
        console.log("Passwords match.");
        if(usernamecheck && passwordcheck) {
            button.disabled = false;
            return true;
        } 
        else {
            return false;
        }
    }
}

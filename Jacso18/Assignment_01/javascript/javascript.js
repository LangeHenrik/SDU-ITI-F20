function checkform(){
    return checkname() && 
    checkpassword() &&
    checkMail();
}

function checkname(){
    let nameRegEx = new RegExp(/[A-Za-zÆØÅæøå1-9]/g);
    let nameInput = document.getElementById("username");
    if(nameRegEx.test(nameInput.value)){
        console.log('Cool name');
        document.getElementById("username").style.outlineColor = "#00e64d";
        return true;
    } else {
        console.log('Not so cool name');
        document.getElementById("username").style.outlineColor = "#ff0000";
        return false;
    }
}

function checkpassword(){
    let passwordRegEx = new RegExp(/[A-Za-zÆØÅæøå\d@$!%*#?&]{8,}/g);
    let passwordInput = document.getElementById("password");
    if(passwordRegEx.test(passwordInput.value)){
        console.log('Password good');
        document.getElementById("password").style.outlineColor = "#00e64d";
        return true;
    } else {
        console.log('Password not good');
        document.getElementById("password").style.outlineColor = "#ff0000";
        return false;
    }
}

function checkMail(){
    let mailRegEx = new RegExp(/\S+@\S+\.([a-z]|[A-Z]){1,5}/g);
    let mailInput = document.getElementById("email");
    if(mailRegEx.test(mailInput.value)){
        console.log('mail good');
        document.getElementById("email").style.outlineColor = "#00e64d";
        return true;
    } else {
        console.log('mail not good');
        document.getElementById("email").style.outlineColor = "#ff0000";
        return false;
    }
}





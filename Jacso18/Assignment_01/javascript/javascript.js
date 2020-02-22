function checkform(){
    checkname();
    checkpassword();
    checkPhoneNumber();
    checkMail();
}

function checkname(){
    let nameRegEx = new RegExp(/^\w+\s\w+$/g);
    let nameInput = document.getElementById("name");
    if(nameRegEx.test(nameInput.value)){
        console.log('Cool name');
        return false;
    } else {
        console.log('Not so cool name');
        return false;
    }
}

function checkpassword(){
    let passwordRegEx = new RegExp(/((?=.*\d)(?=.*[A-Z])(?=.*[a-z])\w.{8,}\w)/g);
    let passwordInput = document.getElementById("password");
    if(passwordRegEx.test(passwordInput.value)){
        console.log('Password good');
        return false;
    } else {
        console.log('Password not good');
        return false;
    }
}

function checkPhoneNumber(){
    let phonenumberRegEx = new RegExp(/^[+][0-9]{8,30}/g);
    let phonenumberInput = document.getElementById("phone");
    if(phonenumberRegEx.test(phonenumberInput.value)){
        console.log('Phone good');
        return false;
    } else {
        console.log('Phone not good');
        return false;
    }
}

function checkMail(){
    let mailRegEx = new RegExp(/\S+@\S+\.([a-z]|[A-Z]){1,5}/g);
    let mailInput = document.getElementById("email");
    if(mailRegEx.test(mailInput.value)){
        console.log('mail good');
        return false;
    } else {
        console.log('mail not good');
        return false;
    }
}





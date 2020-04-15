function checkFields(){
    let name = document.getElementById("username");
    let nameRegex = new RegExp(/(?!.*[\.\-\_]{2,})^[a-zA-Z0-9\.\-\_]{3,24}$/gm);
    let pass = document.getElementById("password");
    let passRegex = new RegExp(/(?=(.*[0-9])+|(.*[ !\"#$%&'()*+,\-.\/:;<=>?@\[\\\]^_`{|}~])+)(?=(.*[a-z])+)(?=(.*[A-Z])+)[0-9a-zA-Z !\"#$%&'()*+,\-.\/:;<=>?@\[\\\]^_`{|}~]{8,}/g);
    if(nameRegex.test(name.value) && passRegex.test(pass.value)) 
    {
        return true;
    }
    else
    {
        document.getElementById("regForm").innerHTML= 
            "<div class='alert alert-warning text-center' role='alert'><b>Invalid username or password</b><br>Password must contain at least 8 characters one digit or one ASCII symbol and both upper and lower case letters</div>";
        return false;
    }
    
}


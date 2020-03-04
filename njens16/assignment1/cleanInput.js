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
        document.getElementById("error").innerHTML= "Invalid username or password <br/> Password must contain at least 8 characters one digit or one ASCII symbol and both upper and lower case letters";
        return false;
    }
    
}


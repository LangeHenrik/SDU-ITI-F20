function checkFields()
{
    let name = document.getElementById("name");
    let nameRegex = new RegExp(/\w{2,}\s\w{2,}/g);
    let pass = document.getElementById("pwd");
    let passRegex = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/g);

    if(nameRegex.test(name.value) && passRegex.test(pass.value))
    {
        return true;
    }
    else
    {
        document.getElementById("error").innerHTML= "Error in name or password " + name.value;
        return false;
    }
    
}

function checkName()
{
    let name = document.getElementById("name");
    document.getElementById("test").innerHTML = "Testing" + name.value;
}

document.getElementById("name").addEventListener("blur", checkName());

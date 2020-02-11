function checkFields()
{
    var testName = document.getElementById('name').value;
    var regex = new RegExp(/\w+\s\w+/g); //Two or more words, separated by whitespace
    if(regex.test(testName)){

        document.getElementById('name').style.color = "green";
        console.log("name is ok");
        
    } else {
        document.getElementById('name').style.color = "red";
        console.log("name is not ok!");
    }
    var testPassword = document.getElementById('password').value;
    //Contains 8 or more chars
    //At least one lower case char 
    //At least one upper case char
    //At least one number
    var regex = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm); 
    if(regex.test(testPassword)){

        document.getElementById('password').style.color = "green";
        console.log("password is ok");
        
    } else {
        document.getElementById('password').style.color = "red";
        console.log("password is not ok!");
    
    }
    var testPhone = document.getElementById('phone').value;
    //Starts with a “+”
    //Has between 8 and 30 digits
    var regex = new RegExp(/^[+][0-9]{8,30}$/g);
    if(regex.test(testPhone)){

        document.getElementById('phone').style.color = "green";
        console.log("phone is ok");
        
    } else {
        document.getElementById('phone').style.color = "red";
        console.log("phone is not ok!");
    
    }

    var testEmail = document.getElementById('email').value;
    // some.name@sub.domain.whatever
    var regex = new RegExp(/^([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/igm);
    if(regex.test(testEmail)){

        document.getElementById('email').style.color = "green";
        console.log("email is ok");
        
    } else {
        document.getElementById('email').style.color = "red";
        console.log("email is not ok!");
    
    }

    
    var testZip = document.getElementById('zip').value;
    //Is exactly 4 digits
    var regex = new RegExp(/^[0-9]{4}$/g); 
    if(regex.test(testZip)){

        document.getElementById('zip').style.color = "green";
        console.log("zip is ok");
        
    } else {
        document.getElementById('zip').style.color = "red";
        console.log("zip is not ok!");
    
    }
}

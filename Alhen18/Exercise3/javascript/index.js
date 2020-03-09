function checkFields() {
    var name = document.getElementById("name").value;
    var password = document.getElementById("password").value;
    var phoneno = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var zip = document.getElementById("zip").value;
    
    if (checkName(name) & checkPassword(password) & checkphone(phoneno) & checkmail(email) & checkzip(zip)) {
        return true;
    } else {
        return false;
    }
}

function checkName(name) {
    var regexp = /\S+\s\S+/g;
    
    if (regexp.test(name)) {
        console.log("Your name is: " + name);
        return true;
    }
    else {
        console.log("Enter First Name and Last Name!");
        return false;
    }
  }

function checkPassword(password) {
    var regexp = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/g;
    
    if (regexp.test(password)) {
        console.log("Your password is:" + password);
        return true;
    } else {
        console.log("Your password must be atleast 8 charaters and contain 1 lower case, 1 upper case and a number!");
        return false;
    } 
}

function checkphone(phone) {
    var regexp = /^\+(?=.{8,30}$)[1-9][\d]+$/g;

    if(regexp.test(phone)){
        console.log("Your phone number is: " + phone);
        return true;
    } else{
        console.log("Your phone number must start with a + and be between 8 & 30 digits!");
        return false;
    }
}

function checkmail(email) {
    var regexp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;
    
    if (regexp.test(email)) {
        console.log("Your email is:" + email);
        return true;
    } else {
        console.log("please enter a valid email");
        return false;
    }
}

function checkzip(zip) {
    var regexp = /^(?=.\d{4}$)/g;

    if (regexp.test(zip)) {
        console.log("Your Zipcode is: " + zip);
        return true;
    } else {
        console.log("The zipcode must be exactly 4 digits");
        return false;
    }
}
function validateFields() {
    var username_value = document.getElementById('username-register').value;
    var regex = new RegExp(/[a-zA-Z0-9]{4,50}$/gm);

    var is_username = false;
    var is_password = false;
    var is_email = false;
    var is_pwd_repeat = false;

    if (regex.test(username_value) == True) {
        document.getElementById('username-register').style.color = "darkblue";
        is_username = true;
        console.log("Username regex");
    } else {
        document.getElementById('username-register').style.color = "pink";
        console.log("Username not regex");
    }

    var password_value = document.getElementById('password-register').value;
    var regex = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{10,50}$/gm);
    if (regex.test(password_value)) {
        document.getElementById('password-register').style.color = "darkblue";
        is_password = true;
        console.log("Password regex")
    } else {
        document.getElementById('password-register').style.color = "pink";
        console.log("Password not regex")
    }

    var email_value = document.getElementById('email-register').value;
    var regex = new RegExp(/([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/gm);
    if (regex.test(email_value)) {
        document.getElementById('email-register').style.color = "darkblue";
        is_email = true;
        console.log("Email regex")
    } else {
        document.getElementById('email-register').style.color = "pink";
        console.log("Email not regex")
    }

    var pwd_repeat_value = document.getElementById('pwd-repeat').value;
    if (pwd_repeat_value == password_value) {
        document.getElementById('pwd-repeat').style.color = "darkblue";
        is_email = true;
        console.log("Password Repeat regex")
    } else {
        document.getElementById('pwd-repeat').style.color = "pink";
        console.log("Password Repeat not regex")
    }
}
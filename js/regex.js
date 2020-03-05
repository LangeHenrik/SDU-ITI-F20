function validateFields() {
    var btn = document.getElementById('signup-submit');
    btn.disable = true;

    var username_value = document.getElementById('username-register').value;
    var regex = new RegExp(/[a-zA-Z0-9]{4,50}$/gm);

    var is_username = false;
    var is_password = false;

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
        document.getElementById('password-register').style.color = "red";
        console.log("Password not regex")
    }
}
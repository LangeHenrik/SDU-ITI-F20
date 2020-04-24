//Validation form that uses regex for control.
function validate(form){
    var Reg = /^[A-Za-z0-9_]{1,20}$/;
    var username = form.querySelector('[name=username]');
    var password = document.getElementById("password").value;

    if (Reg.test(username.value) == false) {
        event.preventDefault();
        alert('Invalid Username.');
        username.focus();
        return false;
    }

    if(password.length < 5) {
        event.preventDefault();
        alert('Password needs to be atleast 5 characters.');
        password.focus();
        return false;
    }
}





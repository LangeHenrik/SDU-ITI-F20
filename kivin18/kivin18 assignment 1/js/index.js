//Event listeners
let modal = document.getElementById('modalForm');
let registerButton = document.getElementById('registerButton');
let closeModal = document.getElementById('closeModal');
let cancelButton = document.getElementById('cancelButton');

function addClickEventListener(element, target, display) {
    if (element) {
        element.addEventListener('click', function () {
            target.style.display = display;
        })
    }
}

addClickEventListener(registerButton, modal, 'block');
addClickEventListener(closeModal, modal, 'none');
addClickEventListener(cancelButton, modal, 'none');

//Regex
function checkFields() {
    if (checkName() && checkPass()) {
        return true;
    } else {
        return false;
    }
}

function checkName() {
    let name = document.getElementById('regUsername').value;
    let invalidLabel = document.getElementById('invalidName')
    let regex = new RegExp(/\w\D\s\w\D/);
    if (regex.test(name)) {
        invalidLabel.innerHTML = '';
        return true;
    } else {
        invalidLabel.innerHTML = 'Enter full name';
        return false;
    }
}

function checkPass() {
    let pass = document.getElementById('regPassword').value;
    let invalidLabel = document.getElementById('invalidPass');
    let regex = new RegExp(/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/);
    if (regex.test(pass)) {
        invalidLabel.innerHTML = '';
        return true;
    } else {
        invalidLabel.innerHTML = 'Password must contain at least 8 characters, 1 lower case, 1 upper case, 1 numeric and one of these special characters: !@#$%^&*';
        return false;
    }
}

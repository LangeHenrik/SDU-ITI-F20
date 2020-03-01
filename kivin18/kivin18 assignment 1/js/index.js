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

//Logged in session
function hideElements(className) {
    let content = document.getElementsByClassName(className);
    for (let i = 0; i < content.length; i++) {
        content[i].style.display = 'none';
    }
}

function contentEventListener(element, target, ajax) {
    if (element) {
        element.addEventListener('click', function () {
            hideElements('content');
            target.style.display = 'block';
            if (ajax) {
                ajax();
            }
        });
    }
}

function ajaxGetCall(url, responseElement) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(responseElement).innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

let feed = document.getElementById('imageFeed');
let users = document.getElementById('users');
let upload = document.getElementById('upload');
let feedButton = document.getElementById('imagesButton');
let usersButton = document.getElementById('usersButton');
let uploadButton = document.getElementById('uploadButton');
let uploadImageButton = document.getElementById('uploadImageBtn');
let logoutButton = document.getElementById('logoutButton').addEventListener('click', function () {
    location.href = 'logout.php';
});

contentEventListener(feedButton, feed, ajaxGetCall("image_feed.php", "imageFeed"));
contentEventListener(usersButton, users, ajaxGetCall("users.php", "userList"));
contentEventListener(uploadButton, upload);

//Upload image
document.getElementById('uploadImageButton').addEventListener('click', function () {
    let xmlhttp = new XMLHttpRequest();
    let form = new FormData(document.getElementById("uploadForm"));
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("uploadInfo").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "upload.php", true);
    xmlhttp.send(form);
});

//Regex
function checkName(elementId, label) {
    let name = document.getElementById(elementId).value;
    let invalidLabel = document.getElementById(label);
    let regex = new RegExp(/^\S\w{5,50}$/);
    if (regex.test(name)) {
        invalidLabel.innerHTML = '';
        return true;
    } else {
        invalidLabel.innerHTML = 'Username must be between 5-50 characters no spaces allowed';
        return false;
    }
}

function checkPass(elementId, label) {
    let pass = document.getElementById(elementId).value;
    let invalidLabel = document.getElementById(label);
    let regex = new RegExp(/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/);
    if (regex.test(pass)) {
        invalidLabel.innerHTML = '';
        return true;
    } else {
        invalidLabel.innerHTML = 'Password must contain at least 8 characters, 1 lower case, 1 upper case, 1 numeric and one of these special characters: !@#$%^&*';
        return false;
    }
}

function confirmPass() {
    let pass = document.getElementById('regPassword').value;
    let passRepeat = document.getElementById('regPasswordRepeat').value;
    let passLabel = document.getElementById('invalidRegPass');
    if (passRepeat === pass) {
        passLabel.innerHTML = "";
        return true;
    } else {
        passLabel.innerHTML = "Passwords don't match!";
        return false;
    }
}

function checkLoginFields() {
    if (checkName('username', 'wrongInfo') && checkPass('password', 'wrongInfo')) {
        return true;
    } else {
        return false;
    }
}

function checkRegisterFields() {
    if (checkName('regUsername', 'invalidRegName') && checkPass('regPassword', 'invalidRegPass') && confirmPass()) {
        return true;
    } else {
        return false;
    }
}

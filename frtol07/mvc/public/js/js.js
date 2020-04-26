console.log("JS is working just fine :)");

// let modalName;
// let modalPW;
// let modalEmail;
// let modalClose;

let name;
let password;
let phone;
let email;
let zip;
var modalName;
var modalPW;
var modalEmail;
var modalClose;

function checkFields() {
    if (checkUserName() &&
        checkPassword()
        &&
        checkEmail()
    ) {
        console.log("returning true checkfields");
        return true;
    } else {
        console.log("returning false from checkfields");
        return false;
    }
}


function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtSearch").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtSearch").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "ajax/?search=" + str, true);
        xmlhttp.send();
    }
 }

 //Shows the file we want to upload
function updateList() {
    var input = document.getElementById('fileToUpload');
    var output = document.getElementById('fileList');
    var children = "";
    for (var i = 0; i < input.files.length; ++i) {
        children += '<li>' + input.files.item(i).name + '</li>';
    }
    output.innerHTML = '<ul>'+children+'</ul>';
    console.log(children+" **")
}

function checkUserName() {

    // Check name
    let regExName = /[a-z|A-Z|æøå|ÆØÅ]{1,20}$/g;
    name = document.getElementById("registrationUsername").value;
    if (name.search(regExName)) {
        console.log("Fail in typed name");
        openNameModal();
        return false;
    } else {
        console.log("Name ok");
        return true;
    }
}

function checkPassword() {
    // Check password
    let regExPassword = /[^-\s]{2,20}$/g;
    password = document.getElementById("registrationPassword").value;
    if (password.search(regExPassword)) {
        console.log("Fail in typed password");
        openPasswordModal();
        return false;
    } else {
        console.log("Password ok");
        return true;
    }
}

function checkEmail() {
    // Check email
    let regExEmail = /^\S+@\S+\.[a-z|A-Z]{2,10}$/g;
    email = document.getElementById("registrationEmail").value;
    if (email.search(regExEmail)) {
        console.log("Fail in typed email");
        openEmailModal();
        return false;
    } else {
        console.log("Email ok");
        return true;
    }
}

function openNameModal() {
    modalClose = document.getElementById("closeModal");
    modalClose.style.display = "block";

    modalName = document.getElementById("openRegistrationUsernameModal");
    modalName.style.display = "block";
}

function openPasswordModal() {
    modalClose = document.getElementById("closeModal");
    modalClose.style.display = "block";

    modalPW = document.getElementById("openRegistrationPasswordModal");
    modalPW.style.display = "block";
}

function openEmailModal() {
    modalClose = document.getElementById("closeModal");
    modalClose.style.display = "block";

    modalEmail = document.getElementById("openRegistrationEmailModal");
    modalEmail.style.display = "block";
}



// // When the user clicks on <span> (x), close the modal
function closeOnX() {
    modalName = document.getElementById("openRegistrationUsernameModal");
    modalName.style.display = "none";
    modalPW = document.getElementById("openRegistrationPasswordModal");
    modalPW.style.display = "none";
    modalEmail = document.getElementById("openRegistrationEmailModal");
    modalEmail.style.display = "none";
    modalClose = document.getElementById("closeModal")
    modalClose.style.display = "none"
}
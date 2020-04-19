console.log("JS is working just fine :)");

// let modalName;
// let modalPW;
// let modalEmail;
// let modalClose;

var modalName;
var modalPW;
var modalEmail;
var modalClose;

function checkFields() {

    // checkUserName();
    // checkPassword();
    // checkEmail();
    //

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

function checkUserName() {

    // Check name
    let regExName = /[a-z|A-Z|æøå|ÆØÅ]{1,20}$/;
    let name = document.getElementById("name").value;
    if (name.search(regExName)) {
        openRegistrationUsernameModal();

        console.log("(JS) Wrong username typed");
        // console.log("(JS) Username ok");
        return false;
        // return true;
    } else {
        console.log("(JS) Username ok");
        // console.log("(JS) Wrong username typed");
        return true;
        // return false;
    }
}


function checkPassword() {
    // Check password
    let regExPassword = /[^-\s]{2,20}$$/;
    let password = document.getElementById("password").value;
    if (password.search(regExPassword)) {
        openRegistrationPasswordModal();

        // console.log("(JS) Password ok");
        console.log("(JS) Wrong password typed");
        return false;
        // return true;
    } else {
        console.log("(JS) Password ok");
        // console.log("(JS) Wrong password typed");
        return true;
        // return false;
    }
}

function checkEmail() {
    // Check email
    let regExEmail = /^\S+@\S+\.[a-z|A-Z]{2,10}$/;
    let email = document.getElementById("email").value;
    if (email.search(regExEmail)) {
        openRegistrationEmailModal();

        // console.log("(JS) Email ok");
        console.log("(JS) Wrong email typed");
        return false;
        // return true;
    } else {
        // console.log("(JS) Wrong email typed");
        console.log("(JS) Email ok");
        return true;
        // return false;
    }
}


// When the user clicks on the button, open the modal
function openRegistrationUsernameModal() {

    modalClose = document.getElementById("closeModal");
    modalClose.style.display = "block";

    modalName = document.getElementById("openRegistrationUsernameModal");
    modalName.style.display = "block";
}

function openRegistrationPasswordModal() {
    modalClose = document.getElementById("closeModal");
    modalClose.style.display = "block";

    modalPW = document.getElementById("openRegistrationPasswordModal");
    modalPW.style.display = "block";
}


function openRegistrationEmailModal() {
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

        // xmlhttp.open("GET", "search.php?search=" + str, true);
        // xmlhttp.open("GET", "home/upLoadView" + str, true);
        // xmlhttp.open("GET", "ajax/ajax" + str, true);
        xmlhttp.open("GET", "ajax/?search=" + str, true);
        xmlhttp.send();
    }

 }
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
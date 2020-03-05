// let modalName;
// let modalPW;
// let modalEmail;
// let modalClose;

var modalName;
var modalPW;
var modalEmail;
var modalClose;

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


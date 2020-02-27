console.log("is working");
var ok = "Accepted"
var bad = "Not good enough"

function checkName() {
    var name = document.getElementById("name").value;
    var regex = /^[a-z ,.'-]+$/i;
    var nameLabel = document.getElementById("okName")
    return giveAnswer(regex, nameLabel)
}


function checkPassword() {
    var name = document.getElementById("password").value;
    var regex = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$";
    var nameLabel = document.getElementById("okPassword")
    return giveAnswer(regex, nameLabel)
}

function checkUserName() {
    var name = document.getElementById("username").value;
    var regex = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;
    var nameLabel = document.getElementById("okUserName")
    return giveAnswer(regex, nameLabel)
}

function giveAnswer(regex, nameLabel) {
    if (regex.test(name)) {
        nameLabel.innerHTML.value = ok
        return true;
    } else {
        nameLabel.innerHTML.value = bad;
        return false;
    }
}


console.log("is good");
var ok = "Accepted"
var bad = "Not good enough"

function checkName() {
    var name = document.getElementById("somename").value;
    var regex = /(\w.+\s).+/i;
    var nameLabel = document.getElementById("name_err")
    if (regex.test(name)) {
        return nameLabel.textContent = "";

    } else {
        return nameLabel.textContent = "Name must contain Firstname and Lastname";
    }
}


function checkPassword() {
    var name = document.getElementById("password").value;
    var regex = /^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})/i;
    var nameLabel = document.getElementById("password_err")
    if (regex.test(name)) {
        return nameLabel.textContent = "";

    } else {
        return nameLabel.textContent = "Password must contain at least 6 Characters";
    }
}

function checkUserName() {
    var name = document.getElementById("username").value;
    var regex = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/i;
    var nameLabel = document.getElementById("username_err")
    if (regex.test(name)) {
        return nameLabel.textContent = "";

    } else {
        return nameLabel.textContent = "Usernames can consist of lowercase and capitals" +
            " Usernames can consist of alphanumeric characters" +
            " Usernames can consist of underscore and hyphens and spaces" +
            " Cannot be two underscores, two hypens or two spaces in a row" +
            " Cannot have a underscore, hypen or space at the start or end";
    }
}

function checkHead() {
    var name = document.getElementById("head").value;
    var regex = /^.{1,26}$/;
    var nameLabel = document.getElementById("head_err")
    if (regex.test(name)) {
        return nameLabel.textContent = "";

    } else {
        return nameLabel.textContent = "Max length is 25 characters!";
    }
}

function checkDescription() {
    var name = document.getElementById("description").value;
    var regex = /^.{1,251}$/;
    var nameLabel = document.getElementById("description_err")
    if (regex.test(name)) {
        return nameLabel.textContent = "";

    } else {
        return nameLabel.textContent = "Max length is 250 characters!";
    }
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
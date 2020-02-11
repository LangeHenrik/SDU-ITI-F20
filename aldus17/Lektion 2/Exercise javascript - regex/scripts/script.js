console.log("js successfully loaded")

function checkForm() {
    checkWords();
    checkPassword();
    checkPhoneNumber();
    checkEmailAddress();
    checkZipcode();
}
// https://regex101.com/
// https://regexr.com/

function checkWords() {
    var word = document.getElementById("name").value;

    var regEx = new RegExp(/(^(\w+\s).+$)/g);

    if (regEx.test(word)) {
        changeLabelColor("nameLabelID", "green");
        return true;
    } else {
        changeLabelColor("nameLabelID", "red");
        return false;
    }
}

function checkPassword() {
    var password = document.getElementById("password").value;
    //var regEx = new RegExp(/([a-z0-9A-Z]{8,})/g);

    // "^$" whole string and needs to end with /gm, m means multiline, "?=.*" look for one or more of the following occourence, the ".*" means any char except line break
    // 
    var regEx = new RegExp(/((?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*\w).[\S]{8,})/g);

    if (regEx.test(password)) {
        changeLabelColor("passwordLabelID", "green");
        return true;
    } else {
        changeLabelColor("passwordLabelID", "red");
        return false;
    }
}

function checkPhoneNumber() {
    var phoneNumber = document.getElementById("phone").value;
    var regEx = new RegExp(/(?:\+)(?:[0-9]{8,30})/g);

    if (regEx.test(phoneNumber)) {
        changeLabelColor("phoneLabelID", "green");
        return true;

    } else {
        changeLabelColor("phoneLabelID", "red");
        return false;
    }
}

function checkEmailAddress() {
    var email = document.getElementById("email").value;
    var regEx = new RegExp(/(\b[\w\.-]+@[\w\.-]+\.\w{2,10}\b)/gi);

    if (regEx.test(email)) {
        changeLabelColor("emailLabelID", "green");
        return true;

    } else {
        changeLabelColor("emailLabelID", "red");
        return false;
    }

}

function checkZipcode() {
    var email = document.getElementById("zip").value;
    var regEx = new RegExp(/^\d{4}$/gm);

    if (regEx.test(email)) {
        changeLabelColor("zipLabelID", "green");
        return true;

    } else {
        changeLabelColor("zipLabelID", "red");
        return false;
    }

}

function changeLabelColor(labelName, color) {
    return document.getElementById(labelName).style.color = color;
}
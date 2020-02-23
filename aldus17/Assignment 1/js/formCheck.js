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

let emailInputField = document.getElementById("for-and-last-name");

emailInputField.addEventListener("", checkWords);

function checkWords() {
    var word = document.getElementById("for-and-last-name").value;

    var regEx = new RegExp(/(^(\w+\s).+$)/g);

    if (regEx.test(word)) {
        changeLabelColor("for-and-last-name-label", "green");
        return true;
    } else {
        changeLabelColor("for-and-last-name-label", "red");
        return false;
    }
}

function checkPassword() {
    var password = document.getElementById("password-label").value;
    //var regEx = new RegExp(/([a-z0-9A-Z]{8,})/g);

    // "^$" whole string and needs to end with /gm, m means multiline, "?=.*" look for one or more of the following occourence, the ".*" means any char except line break
    // 
    var regEx = new RegExp(/((?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*\w).[\S]{8,})/g);

    if (regEx.test(password)) {
        changeLabelColor("password-label", "green");
        return true;
    } else {
        changeLabelColor("password-label", "red");
        return false;
    }
}

function checkPhoneNumber() {
    var phoneNumber = document.getElementById("phone-label").value;
    var regEx = new RegExp(/(?:\+)(?:[0-9]{8,30})/g);

    if (regEx.test(phoneNumber)) {
        changeLabelColor("phone-label", "green");
        return true;

    } else {
        changeLabelColor("phone-label", "red");
        return false;
    }
}

function checkEmailAddress() {
    var email = document.getElementById("email-label").value;
    var regEx = new RegExp(/(\b[\w\.-]+@[\w\.-]+\.\w{2,10}\b)/gi);

    if (regEx.test(email)) {
        changeLabelColor("email-label", "green");
        return true;

    } else {
        changeLabelColor("email-label", "red");
        return false;
    }

}

// Use let as a attribute for the function, like private. 

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
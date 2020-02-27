console.log("is working");

function checkName() {
    var name = document.getElementById("name").value;
    var regex = /^[a-z ,.'-]+$/i;
    var nameLabel = document.getElementById("")
    if (regex.test(name)) {
        nameLabel.style.color = "blue"
        return true;
    } else {
        nameLabel.style.color = "red"
        return false;
    }


    function checkPassword() {
        var name = document.getElementById("password").value;
        var regex = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$";
        var nameLabel = document.getElementById("")
        if (regex.test(name)) {
            nameLabel.style.color = "blue"
            return true;
        } else {
            nameLabel.style.color = "red"
            return false;
        }

    }

    function checkUserName() {
        var name = document.getElementById("username").value;
        var regex = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;
        var nameLabel = document.getElementById("")
        if (regex.test(name)) {
            nameLabel.style.color = "blue"
            return true;
        } else {
            nameLabel.style.color = "red"
            return false;
        }

    }

}
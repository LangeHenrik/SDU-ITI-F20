console.log("inside check_username_ajax.js");

// the message gets blocked by field suggestions
// TODO: Should do some CSS

let nameInputCheck = document.getElementById("username");
// nameInputCheck.addEventListener('keyup', checkname_ajax); // already added in the form

function checkname_ajax(str) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("check_username").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "check_username_ajax.php?q=" + str, true);
    xmlhttp.send();
}


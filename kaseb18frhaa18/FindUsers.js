function findUsers(userName) {
    if (str.length == 0) {
        //get all users
        document.getElementById("users").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("users").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "Users.php?q=" + str, true);
        xmlhttp.send();
    }

}
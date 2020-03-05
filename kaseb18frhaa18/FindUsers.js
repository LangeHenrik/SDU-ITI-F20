function findUsers(userName) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("users").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "Users.php?q=" + userName, true);
    xmlhttp.send();

}
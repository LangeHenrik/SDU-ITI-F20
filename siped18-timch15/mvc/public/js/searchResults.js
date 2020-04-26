
function findUsers(username) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("users").innerHTML = '<tr><th>Username</th></tr>'

        }
    };
    xmlhttp.open("GET", "/siped18-timch15/mvc/public/userList/getSpecificUsers/" + username, true);
    xmlhttp.send();

}





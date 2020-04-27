function findUsers(userName) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("users").innerHTML = '<tr><th>Username</th></tr>'
            var json = JSON.parse(this.response);
            json.forEach(showUsernames);

        }
    };
    xmlhttp.open("GET", "/siped18-timch15/mvc/public/UserList/getSpecificUsers/" + encodeURI(userName), true);
    xmlhttp.send();

}

function showUsernames(item) {
    document.getElementById("users").innerHTML += "<tr> <td>" + item.username + "</td> <tr>";

}



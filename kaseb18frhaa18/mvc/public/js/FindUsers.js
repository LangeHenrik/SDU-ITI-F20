function findUsers(userName) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("users").innerHTML = '<tr><th>Name</th><th>Username</th></tr>'
            var json = JSON.parse(this.response);
            json.forEach(showUsers);
            //document.getElementById("users").innerHTML = json[0].username;

        }
    };
    xmlhttp.open("GET", "/kaseb18frhaa18/mvc/public/UserList/getSpecificUsers/" + encodeURI(userName), true);
    xmlhttp.send();

}

function showUsers(item) {
    document.getElementById("users").innerHTML += "<tr> <td>" + item.name + "</td> <td>" + item.username + "</td> <tr>";

}

function findUsers(userName) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("users").innerHTML = '<thead class="thead-dark"><tr><th scope="col">Username</th></tr></thead>';
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

function keyPressed(e) {
    var key;
    if (window.event)
        key = window.event.keyCode; //IE
    else
        key = e.which; //firefox      

    return (key != 13);
}

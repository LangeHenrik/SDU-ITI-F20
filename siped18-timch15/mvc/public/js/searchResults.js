
function findUsers(str) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("user-table").innerHTML = '<tr><th>Username</th></tr>'
        }
    };
    xmlhttp.open("GET", "/siped18-timch15/mvc/public/Userlist/getSpecificUsername/" + str, true);
    xmlhttp.send();

}



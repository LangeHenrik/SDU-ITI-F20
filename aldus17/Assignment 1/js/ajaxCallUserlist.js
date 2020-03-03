function getUserlist() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "dbconfig_and_controllers/getUserlist.php?", true);
    ajax.send();

    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            var data = JSON.parse(this.responseText);
            console.log(data);

            var html = "";

            for (var a = 0; a < data.length; a++) {
                var fullname = data[a].fullname;
                var username = data[a].username;

                html += "<tr>";
                html += "<td>" + fullname + "</td>";
                html += "<td>" + username + "</td>";
                html += "</tr>";
            }
            document.getElementById("data").innerHTML += html;
        }
    };
}

document.addEventListener("DOMContentLoaded", function() {
    getUserlist();
});
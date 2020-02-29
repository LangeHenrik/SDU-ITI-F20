<?php
require_once('dbconfig_and_controllers/DBConnection.php');
require_once('dbconfig_and_controllers/DBController.php');
require_once('dbconfig_and_controllers/UserController.php');

UserController::logout();

?>
<!DOCTYPE html>

<header>
    <title>Userlist page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userlist_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</header>

<body>
    <div class="navbar" id="navbar">
        <ul>
            <li><a class="active" href="front_page.php">Home</a></li>
            <li> <a href="upload_page.php">Upload</a></li>
            <li> <a href="imagefeed_page.php">Imagefeed</a></li>
            <li> <a href="#userlist">Userlist</a></li>
            <li>
                <form method="post">
                    <div class="inner_container">
                        <button class="logoutbtn" name="logoutbtn" type="submit">Log Out</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>

    <div class="userlist_wrapper">
        <div class="userlist_content">
            <h1>User list</h1>
            <table class="userlist_table">
                <tr>
                    <th>Fullname</th>
                    <th> Username</th>
                </tr>
                <!-- Data from the Ajax call at the bottom of the file-->
                <tbody id="data"></tbody>
                <!----------------------------------->
            </table>
        </div>
    </div>

    </div>
</body>
<script>
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "dbconfig_and_controllers/getUserlist.php", true);
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
</script>

<!--
<footer id="index-footer">
    <p>Assignment 1 course ITI &amp; XI-IT - Aleksander Grzegorz Duszkiewicz (aldus17)</p>
</footer>
-->

</html>
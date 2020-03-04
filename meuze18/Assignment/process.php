<?php
    //får værdier fra login.php
    $username = $POST['username'];
    $password = $POST['password'];

    //for at undgå sql injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

    //tilslut serveren og databasen
    mysql_connect("localhost", "root", "");
    mysql_select_db("assignmentiti");

    //vælg brugere fra databasen
    $result = mysql_query("SELECT * FROM users")
?>
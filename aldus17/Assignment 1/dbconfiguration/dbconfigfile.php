<?php
function OpenCon()
{
    $db_hostname = "localhost";
    $db_username = "root";
    $db_password = "1234";
    $db_name = "example";
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_name) or die("Connection to the database failed: %s\n" . $conn->error);

    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}

<?php
    $servername = "localhost";
    $dbname = "MSchr18_Phans18_Mach018";

    if (is_dir("C:\Users\madsw")) 
    {
        $username = "root";
        $password = "password";
    }
    else if (is_dir("C:\Users\Peter Hansen"))
    {
        $username = "root";
        $password = "mysql";
    }
    else if (is_dir("C:\Users\martin"))
    {
        $username = "root";
        $password = "martins login";
    }
    else 
    {
        // Hej Henrik, skriv dine oplysninger her.
        $username = "root";
        $password = "password";    
        $servername = "localhost";
        $dbname = "MSchr18_Phans18_Mach018";
    }

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

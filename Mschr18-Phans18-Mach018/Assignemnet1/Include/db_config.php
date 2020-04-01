<?php
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
    else if (is_dir("/Users/peterhansen"))
		{
      echo "<script> console.log('Hello world!''); </script>";
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
    }
    $servername = "localhost";
    $dbname = "Mschr18_Phans18_Mach018";

    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    );
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options);
?>

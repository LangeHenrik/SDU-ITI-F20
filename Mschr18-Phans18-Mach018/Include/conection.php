<?php
include 'db_config.php';
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Har vi en bruger med samme brugernavn?
    $fuldname = $_POST["fuldname"]; 
    $username = $_POST["newusername"]; 
    $stmt = $conn->prepare("SELECT * FROM users WHERE
                            users.username = '$username' OR 
                            users. fuldname = '$fuldname';");
    $numRowsAffected = $stmt->execute();
    if ($numRowsAffected != 0) {
        // En bruger har allerede det samme navn eller brugernavn
    }
    //      Alternativt kan vi gøre, hvis det ovenfor ikke virker.
    //$stmt->setFetchMode(POD::FETCH_NUM);
    //$result = $stmt->fetchAll();
    //if (!empty($result)) {
    //    // En bruger har allerede det samme navn eller brugernavn
    //}

    // inset ny bruger.
    $stmt = $conn->prepare("INSERT INTO users (username, passw, fuldname, phone, email)
                           VALUES ('$_POST[0]', '$_POST[1]', '$_POST[2]', '$_POST[3]', '$_POST[4]');");
    $stmt->execute();

    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage() . ".\n code " . $e->getDode();
    }
?>

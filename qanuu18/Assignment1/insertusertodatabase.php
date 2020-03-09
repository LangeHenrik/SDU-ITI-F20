<?php
session_start();

require_once 'extfiles/config.php';
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['registrate']))
    {


        $stmt = $conn->prepare("INSERT INTO userinfo (user, password) VALUES (:usernameInput, :passwordInput);");
   // use exec() because no results are returned
   
        
        $stmt->execute();
        echo "New record created successfully";


    }
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>

<?php
require_once('Include/db_config.php');
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception.
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Har vi en bruger med samme brugernavn?
    function trim_input(&$input) {
        $input = trim($input);
    }
    array_filter($_POST, 'trim_input');

    $inputArr =
    array("fullname" => filter_var($_POST["fullname"], FILTER_SANITIZE_STRING), // Strip tags, optionally strip or encode special characters.
          "username" => filter_var($_POST["newusername"], FILTER_SANITIZE_STRING),
          "password" => password_hash(filter_var($_POST["newpassword"], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT), // Hashing password right away.
          "phone" => filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_INT),   // Remove all characters except digits, plus and minus sign.
          "email" => filter_var($_POST["email"], FILTER_SANITIZE_EMAIL)         // Remove all characters except letters, digits and !#$%&'*+-=?^_`{|}~@.[].
         );

    // Indset ny bruger.
    $stmt = $conn->prepare("INSERT INTO user (username, password, fullname, phone, email, signup_date)
                           VALUES (:username, :password, :fullname, :phone, :email, now());");
    $stmt->bindParam(':username', $inputArr["username"]);
    $stmt->bindParam(':password', $inputArr["password"]);
    $stmt->bindParam(':fullname', $inputArr["fullname"]);
    $stmt->bindParam(':phone', $inputArr["phone"]);
    $stmt->bindParam(':email', $inputArr["email"]);
    $result = $stmt->execute();

    echo "<script> console.log('User created with result: $result'); </script>" ;

    if ($result == 1) {
        require 'index.php';
    }
}
catch(PDOException $e)
{
    echo "<br>Connection failed: " . $e->getMessage() . ".\n code " . $e->getCode();
}

$conn = null;
?>

<?php
session_start();

if (isset($_POST['login'])) {
    try {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $pdo = new PDO('mysql:host=localhost;dbname=odinsblog', null, null);

        // calling stored procedure command
        $sql = 'CALL LoginValidation(:username,:password,@message)';

        // prepare for execution of the stored procedure
        $stmt = $pdo->prepare($sql);

        // pass value to the command
        $stmt->bindParam(':username', $username, PDO::PARAM_STR, 45);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 45);


        // execute the stored procedure
        $stmt->execute();

        $stmt->closeCursor();

        // execute the second query to get customer's level
        $row = $pdo->query("SELECT @message AS return_message")->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            if($row !== false){
                echo $row['return_message'];
            }
        }
    } catch
    (PDOException $e) {
        die("Error occurred:" . $e->getMessage());
    }
}


?>
<?php
session_start();

try {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $ok = true;
    $messages = array();

    if(empty($username) || !isset($_POST['username'])){
        $ok = false;
        $messages[] = 'Username cannot be empty!';
    }


    if(empty($password) || !isset($_POST['password'])){
        $ok = false;
        $messages[] = 'Password cannot be empty!';
    }

    if($ok) {
        $pdo = new PDO('mysql:host=localhost;dbname=odinsblog', 'root', 'rootelioa20');

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

        $row = $pdo->query("SELECT @message AS return_message")->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            if ($row !== false) {
                if($row["return_message"]!=null){
                    $ok = false;
                    $messages[] = $row["return_message"];
                }
                else{
                    $ok = true;
                    $messages[] = 'Successful Login';
                }
            }
        }

    }
} catch
(PDOException $e) {
    die("Error occurred:" . $e->getMessage());

}

echo json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages
    )
);

?>
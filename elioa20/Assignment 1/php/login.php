<?php
session_start();

require_once 'db_config.php';

try {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $ok = true;
    $messages = array();

    if(empty($username)){
        $ok = false;
        $messages[] = 'Username cannot be empty!';
    }


    if(empty($password)){
        $ok = false;
        $messages[] = 'Password cannot be empty!';
    }

    if($ok) {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);

        // calling stored procedure command
        $sql = 'CALL Login(:username,@returnParam)';

        // prepare for execution of the stored procedure
        $stmt = $pdo->prepare($sql);

        // pass value to the command
        $stmt->bindParam(':username', $username, PDO::PARAM_STR, 45);

        // execute the stored procedure
        $stmt->execute();

        $stmt->closeCursor();

        $row = $pdo->query("SELECT @returnParam AS return_value")->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            if ($row !== false) {
                if($row["return_value"] === 'User does not exist'){
                    $ok = false;
                    $messages[] = $row["return_value"];
                }
                else if(!password_verify($password,$row["return_value"])){
                    $ok = false;
                    $messages[] ='Invalid Password';
                }
                else{
                    $_SESSION['logged_in'] = $username;
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
<?php

if (isset($_POST['login-submit'])) {
    
    require_once "dbh.inc.php";

    $username = filter_var($_POST['username_header'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['pwd_header'], FILTER_SANITIZE_STRING);

    if (empty($username) || empty($password)) {
        header("Location: index.php?error=emptyfields");
        exit();
    }
    else {

        try {

        $conn = new PDO("mysql:host=$servername;dbname=$dBName", $dBUsername, $dBPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM users WHERE memmo_username=:username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            $result = $stmt->fetch(PDO::FETCH_OBJ);

            $checkPassword = password_verify($password, $result->memmo_pwd);

            if ($checkPassword == false) {
                header("Location: index.php?error=badpassword");
                exit();
            }
            elseif ($checkPassword == true) {
                session_start();
                $_SESSION['session_id'] = $result->memmo_id;
                $_SESSION['session_username'] = $result->memmo_username;
                
                header("Location: index.php?login=success");
                exit();
            }
            else {
                header("Location: index.php?error=badpassword");
                exit();
            }
        }
        else {
            header("Location: index.php?error=usernotfound");
            exit();
        }

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } finally {
            $conn = null;
            echo "connection closed";
        }

    }


}
else {
    header("Location: index.php");
    exit();
}

?>
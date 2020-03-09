<?php

if (isset($_POST['signup-submit'])) {

    require_once "dbh.inc.php";

    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['pwd'], FILTER_SANITIZE_STRING);
    $passwordConfirm = filter_var($_POST['pwd-confirm'], FILTER_SANITIZE_STRING);

    if (empty($username) || empty($password) || empty($passwordConfirm)) {
        header("Location: signup.php?error=emptyfields&username=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: signup.php?error=invalidusername=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
        header("Location: signup.php?error=invalidpassword");
        exit();
    }
    else if ($password !== $passwordConfirm) {
        header("Location: signup.php?error=passwordcheck&username=".$username);
        exit();
    }
    else {
        
        try {
            // boilerplate. Find a better solution
            // In the future I shoueld probably make use of Singleton
            $conn = new PDO("mysql:host=$servername;dbname=$dBName", $dBUsername, $dBPassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";

            $stmt = $conn->prepare("SELECT memmo_username FROM users WHERE memmo_username=:username");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            echo "after stmt->execute()";
            if ($stmt->rowCount() > 0) {
                header("Location: signup.php?error=usertaken");
                exit();
            }
            else {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                
                $stmt = $conn->prepare("INSERT INTO users (memmo_id, memmo_username, memmo_pwd) VALUES (NULL, :username, :user_password)");
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->bindParam(':user_password', $hashedPwd, PDO::PARAM_STR);
                $stmt->execute();

                header("Location: index.php?signup=success");
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
    // remember location of file
    header("Location: signup.php");
    exit();
}


<?php


function verify_login_attempt($login_name, $user_password)
{
    require_once 'db_config.php';

    try {
        $conn = new PDO(
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );

        $stmt = $conn->prepare("SELECT user_password FROM user WHERE username = :login_name");
        $stmt->bindParam(':login_name', $login_name);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchColumn(0);

        if (isset($result)) {
            return password_verify($user_password, $result);
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error:" .$e->getMessage();
        return false;
    }

    $conn = null;
}

function check_if_username_is_unique($conn, $login_name)
{
    $stmt = $conn->prepare("SELECT * FROM user where username = :login_name");
    $stmt->bindParam(':login_name', $login_name);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    if (isset($result[0])) {
        return false;
    } else {
        return true;
    }
}

function register_user($login_name, $user_password)
{
    require_once 'db_config.php';

    try {
        $conn = new PDO(
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
    
        if (!check_if_username_is_unique($conn, $login_name)) {
            return "Username is already taken.";
        }

        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO user (username, user_password) VALUES (:login_name, :password_hash)");
        $stmt->bindParam(':login_name', $login_name);
        $stmt->bindParam(':password_hash', $hashed_password);
        $stmt->execute();
        
        return "";
    } catch (PDOException $e) {
        return "Error:" .$e->getMessage();
    }
    $conn = null;
}

function get_users($login_name = "")
{
    require_once 'db_config.php';

    try {
        $conn = new PDO(
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );

        if ($login_name === "") {
            $stmt = $conn->prepare("SELECT username FROM user");
        } else {
            $stmt = $conn->prepare("SELECT username FROM user WHERE username = :username");
            $stmt->bindParam(':username', $login_name);
        }
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    } catch (PDOException $e) {
        return "Error:" .$e->getMessage();
    }

    $conn = null;
}

function get_image_posts()
{
    require_once 'db_config.php';

    try {
        $conn = new PDO(
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );

        $stmt = $conn->prepare("SELECT * FROM picture");

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    } catch (PDOException $e) {
        return "Error:" .$e->getMessage();
    }

    $conn = null;
}

function upload_post($picture, $header, $description, $login_name)
{
    require_once 'db_config.php';

    try {
        $conn = new PDO(
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );

        $stmt = $conn->prepare("INSERT INTO picture (picture, header, description, uploader) 
        VALUES (:picture, :header, :description, :login_name)");
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':header', $header);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':login_name', $login_name);
        $stmt->execute();
    } catch (PDOException $e) {
        return "Error:" .$e->getMessage();
    }

    $conn = null;
}

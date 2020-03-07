<?php
require_once "config.php";
session_start();
if( !empty ($_POST))
{
    if(isset($_POST["username"]) && isset($_POST["password"]))
    {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        try 
        {
            $conn = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM user WHERE username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":username", $username);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);        
            
            if($user === false)
            {
                die("Wrong username");
            }
            else
            {
                if(password_verify($password, $user["password"]))
                {
                    $_SESSION["user_id"] = $user["user_id"];
                    $_SESSION["logged_in"] = time();
                    header("Location: index.php");
                }
                else
                {
                    die("Wrong password");
                }
            }
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    header("Location: index.php");
}
?>

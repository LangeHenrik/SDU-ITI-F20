<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Assignement 1</title>
        <link rel="stylesheet" href="style.css" type="text/css" media="all">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all">
 
    </head>
    <body>
        <div class="header">
            <h1>Assignement 1</h1>
        <nav class="menu">
            <a class="active" href="index.php">Home</a> 
         </nav>
        </div>
        <div class="wrapper">
            <div class="frame">
            <div class="content">
 <?php
session_start();
if(isset($_SESSION["user_id"]) && isset($_SESSION["logged_in"]))
{
    header("Location: index.php");
}
else
{
?>
            <div class="registration">
                <form onsubmit="return checkFields()" action="register.php" method="post" accept-charset="utf-8">
                    <input type="text" value="" name="username" placeholder="Username" id="username" requred/> <br/>
                    <input type="password" value="" name="password" placeholder="Password" id="password" requred/><br/>
                <button type="submit" value="register" id="submit">Register</button><br/>
                <p id="error"></p>
                </form>
            </div>
            </div>
            </div>

<?php
require_once "config.php";
    if( !empty ($_POST))
{
    if(isset($_POST["username"]) && isset($_POST["password"]))
    {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $password = password_hash($password, PASSWORD_BCRYPT, $opptions);
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
                $sql = "INSERT INTO user(username, password) VALUES(:username, :password)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":password", $password);
                $stmt->bindValue(":username", $username);
                $stmt->execute();
                header("Location: index.php");
            }
            else
            {
                die("User allredy exists");
            }
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    }
}
?>
 
        <script src="cleanInput.js"></script>
    </body>
</html>


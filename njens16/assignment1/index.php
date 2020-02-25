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
        </div>
 <?php
session_start();
if(isset($_SESSION["user_id"]) && isset($_SESSION["logged_in"]))
{
?>
       <div class="menu">
            <a class="active" href="index.php">Home</a> 
            <a href="index.php">test</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="wrapper">
            <div class="content">
                <p>Welcome</p>
<?php
}
else
{
?>
       <div class="menu">
            <a class="active" href="index.php">Home</a> 
        </div>
        <div class="wrapper">
            <div class="content">
 
                <div class="login">
                <form action="index.php" method="post" accept-charset="utf-8">
                    <input type="text" value="" name="username" placeholder="Username" id="username"/> <br/>
                    <input type="password" value="" name="password" placeholder="Password" id="password"/>    <br/>
                <button type="submit" value="login" id="submit">Login</button>
                </form>
                </div>
            </div>
        </div>

<?php
}
require_once "config.php";

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
                if($password == $user["password"])//password_verify($password, $user["password"]))
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
}
?>
 
    </body>
</html>



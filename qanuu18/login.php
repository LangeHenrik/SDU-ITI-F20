<?php
session_start();

require_once 'extfiles/config.php';
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

    if (isset($_POST['login']))
    {
        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            echo "Please fill all fields";
        }
        else
        {
            $query = "SELECT * FROM user WHERE username = :username AND password = :password";
            $stmt = $conn->prepare($query);
            $stmt->execute(array(
                'username' => $_POST["username"],
                'password' => $_POST["password"]
            ));
            $count = $stmt->rowCount();

            if ($count > 0)
            {
                $_SESSION["username"] = $_POST["username"];
                header("location:imagefeed.php");
            }
            else
            {
                echo "Wrong username or password";
            }
        }
    }
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

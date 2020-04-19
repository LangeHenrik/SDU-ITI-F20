<?php
session_start();
require_once 'extfiles/config.php';
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submitbtn'])) {

        $usernameinput = filter_input(INPUT_POST,"usernameInput", FILTER_SANITIZE_STRING);
        $passwordinput = filter_input(INPUT_POST,"passwordInput",FILTER_SANITIZE_STRING);
        $hashedpassword = password_hash($passwordinput,PASSWORD_DEFAULT);
        

        //if($passwordInput == $passwordInput2) {

            //Denne her kryptere koden og username
            // $passwordInput = md5($passwordInput);
            // $usernameInput = md5($usernameInput);


            $query = $conn->prepare("INSERT INTO userinfo(user, password) VALUES (:username, :password)");
            $query->execute(array(
                "username" => $usernameinput, 
                "password" => $hashedpassword
            )); 
            $query->setFetchMode(PDO::FETCH_ASSOC);
            echo "<div class='form'>
            <h3>You are registered successfully.</h3>
            <br/>Click here to <a href='index.php'>Login</a></div>";
        } else {
            echo "Try again";
        }
    }
//}

catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

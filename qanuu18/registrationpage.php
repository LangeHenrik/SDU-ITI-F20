<?php
session_start();
require_once 'extfiles/config.php';
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['registrate'])) {
        $usernameInput = ($_POST['usernameInput']);
        $passwordInput = ($_POST['passwordInput']);
        $passwordInput2 = ($_POST['passwordInput2']);

        if($passwordInput == $passwordInput2) {

            //Denne her kryptere koden og username
            // $passwordInput = md5($passwordInput);
            // $usernameInput = md5($usernameInput);

            $query = $conn->prepare("INSERT INTO user(username, password) VALUES ('$usernameInput', '$passwordInput')");
            $query->execute(); 
            $query->setFetchMode(PDO::FETCH_ASSOC);
            echo "<div class='form'>
            <h3>You are registered successfully.</h3>
            <br/>Click here to <a href='index.php'>Login</a></div>";
        } else {
            echo "Try again";
        }
    }
}

catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="extfiles/styling.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<title>Registration Page</title>

</head>
<h1>Register page</h1>
<div id="frm">
    <form onsubmit="return checkallforms();" name="registrate" method="POST" action="registrationpage.php">
        <p>
            <label>Register Now!</label>
        </p>
        <label for="usernameInput">New username:</label>

        <input type="text" id="usernameInput" name="usernameInput" placeholder="Username" required>
        <p class="usernameInfo" id="usernameInfo "></p>

        <label for="passwordInput">New password:</label>

        <input type="password" id="passwordInput" name="passwordInput" placeholder="Password" required>
        <p class="passwordInfo" id="passwordInfo"></p>

        <label for="passwordInput">Password again:</label>

        <input type="password" id="passwordInput" name="passwordInput2" placeholder="Password" required>
        <p class="passwordInfo" id="passwordInfo"></p>

        <input type="submit" name="registrate" id="submit" value="Register">
    </form>
</div>


<script src="extfiles/Registration.js "></script>

</body>

</html>
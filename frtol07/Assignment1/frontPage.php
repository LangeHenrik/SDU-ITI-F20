<?php

ob_start();

session_start();
?>


<html lang="en">

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<br><br><br><br><br><br>
<div class="container">
    <form name="formLogin" method="post">
        <label for="username" class="label">Username </label>
        <br>
        <input type="text" name="loginUsername" id="name" class="inputbox"/>
        <br>
        <label for="password" class="label">Password</label>
        <br>
        <input type="password" name="loginPassword" id="password" class="inputbox"/>
        <br><br>

        <input type="submit" name="submit" id="submit" value="Ok" class="bigBtn"/>
    </form>
</div>

<br><br><br>
<div class="container">
    <label class="label">    Click here to register:</label>
    <br><br>
    <form action="registrationPage.php">
        <input class="bigBtn" type="submit" value="Register" />
    </form>
</div>
<br>
<br>
<br>
<br>


<!-- Trigger/Open The Modal -->

<!--Modal for closing all-->
<div id="closeModal" onclick="closeOnX()" class="modal">
    <span class="close">&times;</span>
</div>


<!-- incorrect name modal -->
<div id="incorrectNameModal" onclick="closeOnX()" class="modal">

    <!-- Modal Enter correct name -->
    <div class="modal-content">
        <p> Please enter correct name</p>
    </div>

</div>

<!-- incorrect PW modal -->
<div id="incorrectPWModal" onclick="closeOnX()" class="modal">

    <!-- Modal Enter correct name -->
    <div class="modal-content">
        <p> Please enter correct password</p>
    </div>

</div>

</body>
</html>


<?php

include('functions.php');
include('connect.php');
include('db_config.php');
?>

<?php

////// Create test user

$testUsername = "TorpedoTorben";
$testPassword="1234";
$testEmail = "test@test.com";
$testPasswordHash = password_hash($testPassword,PASSWORD_DEFAULT);

$stmt = "INSERT IGNORE INTO `users`(`username`, `password`, `email`)
VALUES(:username,:password,:email)";

$query = $pdo->prepare($stmt);
$query->bindParam(':username', $testUsername, PDO::PARAM_STR);
$query->bindParam(':password', $testPasswordHash, PDO::PARAM_STR);
$query->bindParam(':email', $testEmail, PDO::PARAM_STR);

$query->execute();
//


if (isset($_POST['loginUsername'])) {

    $user = htmlspecialchars($_POST['loginUsername']);
    $pass = htmlspecialchars($_POST['loginPassword']);


    if (empty($user) || empty($pass)) {
        echo 'All field are required';
    } else {
        $query = $pdo->prepare("SELECT username, password FROM users WHERE 
username=? ");
        $query->execute(array($user));
        $row = $query->fetch(PDO::FETCH_BOTH);


        $userFromDb = filter_var($row['username'],FILTER_SANITIZE_STRING);
        $pwFromDb = filter_var( $row['password'],FILTER_SANITIZE_STRING);

        if ($user === $userFromDb && password_verify($pass, $pwFromDb)) {
            if ($query->rowCount() > 0) {

                $_SESSION['username'] = $user;
//            header('location:imageFeed.php');
                echo "You will be redirected in 5 seconds...";
                echo "<br>";
                echo "<meta http-equiv=Refresh content=5;url=imageFeed.php>";

            } else {
                echo "Wrong username or password";
            }
        }else {
            echo "Wrong username or password";
        }


    }
}
?>







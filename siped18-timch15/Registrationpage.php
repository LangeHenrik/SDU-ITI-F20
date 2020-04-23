<?php
require_once'db_config.php';
?>

<!DOCTYPE html>
<head>
    <title>Semester feed</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php

$chk_u = $conn->prepare("SELECT username FROM user WHERE username = :username");
$chk_u->bindParam(':username', $username);

$chk_e = $conn->prepare("SELECT email FROM user WHERE email = :email");
$chk_e->bindParam(':email', $email);

$chk_u->execute();
$chk_e->execute();

if ($chk_u->rowCount() > 0) {
    print("Sorry ");
} elseif ($chk_e->rowCount() > 0) {
    print("Sorry this email is already asign to a user");
} else {
    $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, username, email, password)
    VALUES (:firstname, :lastname, :username, :email, :password)");

    $stmt->bindParam(':firstname', $_POST['firstname']);
    $stmt->bindParam(':lastname', $_POST['lastname']);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $_POST['password']);
    $result = $stmt->execute();
}

?>
    <div class="login-page">
        <div class="form">
            <form onsubmit="return checkForm();" method="POST" onchange="saveuser" >
                <label for="firstname">Firstname</label><br>
                <input type="text" name="firstname" id="firstname" placeholder="Your first name..">
                <p class="info" id="firstnameinfo"></p>

                <label for="lastname">Lastname</label><br>
                <input type="text" name="lastname" id="lastname" placeholder="You last name..">
                <p class="info" id="lastnameinfo"></p>

                <label for="username">Username</label><br>
                <input type="text" name="username" id="username" placeholder="You username..">
                <p class="info" id="usernameinfo"></p>

                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" placeholder="You email..">
                <p class="info" id="emailinfo"></p>

                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" placeholder="You password..">
                <p class="info" id="passwordinfo"></p>

                <button type="submit" name="submit">Sign up</button> 
                <p class="info"><a href="Frontpage.php"></a></p>
            </form>
        </div>
    </div>

    <script src="RegistrationpageJS.js"></script>

</body>
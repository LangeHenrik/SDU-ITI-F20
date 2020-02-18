<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<?php
    $corretUser = "test";
    $corretPass = "test";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();}

    if(isset($_POST["logout"])){
        $_SESSION["LoggedIn"] = false;
        session_destroy();
    }

    if(isset($_POST["username"]) && isset($_POST["password"])){
        $user = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $pass = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

        if($pass == $corretPass && $user == $corretUser){
            $_SESSION["LoggedIn"] = true;
            echo "Welcome $user";

        } else {
            echo "Wrong credentials";
        }
    }

    if (isset($_SESSION["LoggedIn"]) and $_SESSION["LoggedIn"] == true){
        echo '<form method="post">
    <input type="hidden" name="logout" value="true">
    <button type="submit">Logout</button>
</form>';
    } else {
        echo '<form method="post" >
                <input type="text" name="username" placeholder="Username"> <br/>
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Submit</button>
            </form>';
    }
?>

<!--<form method="post" >
    <input type="text" name="username" placeholder="Username"> <br/>
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Submit</button>
</form> -->

<!--<form method="post">
    <input type="hidden" name="logout" value="true">
    <button type="submit">Logout</button>
</form>-->
</body>
</html>
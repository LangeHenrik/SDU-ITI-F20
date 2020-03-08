<?php
    require_once 'database_controller.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>ITI Ass.1 - Registration Page</title>
    <meta name="viewport"  content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
    <nav>
        <?php include 'menu.php'; ?>
    </nav>

    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $login_name = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
            
            if (preg_match("/^[\w|æøå|ÆØÅ|\d]+$/", $login_name) &&
            preg_match("/^(?=.*[A-ZÆØÅ])(?=.*[a-zæøå])[A-ZÆØÅa-zæøå\d]{8,}$/", $password)) {
                $register_success = register_user($login_name, $password);
                if ($register_success == "") {
                    header("Location: index.php");
                }
            } else {
                echo "Password sucks";
            }
        }
    ?>

    <div class="wrapper">
        <div class="content">

            <h2>Register User</h2>

            <form onsubmit="return checkform()" method="post">
                <label for="username">Username - </label>
                <label for="username" class="constraints">Only letters, numbers, and underscore allowed.</label>
                <br>
                <input type="text" name="username" id="username" value="<?= $login_name ?? ''?>"/>
                <i id="usernameIsValidIcon" class="fas fa-lg"></i>
                <p class="info" id="nameinfo"><?= $register_success ?? ''?></p>
                <br>
                <br>
                <label for="password">Password - </label>
                <label for="password" class="constraints">Must be at least 8 characters long with at least 1 lowercase and 1 uppercase.</label>
                <br>
                <input type="password" name="password" id="password" />
                <i id="passwordIsValidIcon" class="fas fa-lg"></i>
                <br>
                <br>
                <input type="submit" name="submit" id="submit" />
                <p class="info" id="submitinfo"></p>
            </form>
        </div>
    </div>

    <script src="validation.js"></script>
</body>

</html>
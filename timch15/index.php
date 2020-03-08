<?php
    require_once 'database_controller.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>ITI Ass.1 - Frontpage</title>
    <meta name="viewport"  content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $login_name = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
            
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            
            if (verify_login_attempt($login_name, $password)) {
                $_SESSION['logged_in'] = true;
                $_SESSION['current_user'] = $login_name;
                header("Location: imagefeed.php");
            } else {
                $_SESSION['logged_in'] = false;
                $login_error = "Incorrect username or password!";
            }
        }
    ?>

    <nav>
        <?php include 'menu.php'; ?>
    </nav>

    <div class="wrapper">
        <div class="content">


            <div class="login-wrapper">
                <h1>Login</h1>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?= $login_name ?? ''?>"/>
                    <br/>
                    <label for="password">Password&nbsp;</label>
                    <input type="password" name="password" id="password" />
                    <br/>
                    <br/>
                    <input type="submit" name="submit" id="submit" />
                    <p class="login-error" id="login-error"><?= $login_error ?? ''?></p>

                </form>
            </div>


        </div>
    </div>
</body>

</html>
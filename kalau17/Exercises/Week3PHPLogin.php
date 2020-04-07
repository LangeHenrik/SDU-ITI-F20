
<?php
    $correct_username = "joe";
    $correct_password = "pass";

    $username = filter_var ( $_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var ( $_POST["password"], FILTER_SANITIZE_STRING);

    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if($username === $correct_username
    && $password === $correct_password) {
        $_SESSION['logged_in'] = true;
        echo 'logged in!';
    } else {
        $_SESSION['logged_in'] = false;
        echo 'wrong username or password';
    }

    if($_SESSION['logged_in']) : ?>

        <br/>
        <form method="post">
            <input name="username" placeholder="username" id="username" />
            <input name="password" type="password" placeholder="password" id="password" />
            <input type="submit" />
        </form>

        <?php else : ?>

        <form method="post">
            <input type="submit" value="log out" />
        </form>

    <?php endif; ?>
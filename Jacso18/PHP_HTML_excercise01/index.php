

<?php 
    $correct_username = "joey";
    $correct_password = "p@ssW0rd";

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if($username == $correct_username && $password == $correct_password){
        $_SESSION['logged_in'] = true;
        echo 'correct username and password';
    } else { 
        $_SESSION['logged_in'] = false;
        echo 'wrong username or password';

    }


    if($_SESSION['logged_in']) : ?>
        <br/>
        <form method="post">
            <input type="submit" name="logut" id="logout" value="logout"/>
        </form>
        <?php else: ?>
        <form method = "post">
            <input name="username" placeholder="username" id="username" />
            <input name="password" type="password" placeholder="password" />
            <input type="submit" value="login" />
        </form>
    <?php endif; ?>
<?php

// Hard coded values to check upon
$correctName = 'aleksander';
$correctPassword = '1234';

// Filter specific external variable by name and filters it.
// FILTER_SANITIZE_STRING: Strip tags, optionally strip or encode special characters.
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($username == $correctName && $password == $correctPassword) {
    $_SESSION['logged_in'] = true;
    echo 'You have logged ind successfully';
} else {
    $_SESSION['logged_in'] = false;
    echo 'Wrong username and password';
}

if ($_SESSION['logged_in']) : ?>
<br />
<form method = 'post'>
<input type = 'submit' name = 'logut' id = 'logout' value = 'logout' />
</form>
<?php else : ?>

<form method = 'post'>
<input name = 'username' placeholder = 'username' id = 'username' />
<input name = 'password' type = 'password' placeholder = 'password' />
<input type = 'submit' value = 'login' />
</form>
<?php endif;
?>
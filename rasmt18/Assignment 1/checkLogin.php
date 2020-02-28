<?php
$loggedIn == False;
if($_POST["username"] == "username") {
    echo 'Hej user';
    $loggedIn == True;
} else {
    echo 'Wrong user';
    $loggedIn == False;
}
?>
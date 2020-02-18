<?php
$loggedIn == False;
if($_POST["name"] == "Mathias") {
    echo 'Hej Mathias';
    $loggedIn == True;
} else {
    echo 'Wrong user';
    $loggedIn == False;
}
?>
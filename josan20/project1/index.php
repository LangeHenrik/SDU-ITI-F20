<?php
include 'common/header.php';
?>

<h1>This is index.php</h1>
<?php

//if (session_status() == PHP_SESSION_NONE) {
    require_once 'login.php';
//}
//else {
//    require_once 'frontpage.php';
//}


include 'common/footer.php';
if (session_status() == PHP_SESSION_NONE && !isset($_SESSION["logged_in"])){
    echo "<h1>is session out</h1>";
}
print_r($_SESSION);
echo "----------<br>";
if ($_SESSION["logged_in"]){
    var_dump($_SESSION["logged_in"]);
}
echo "----------<br>";
?>
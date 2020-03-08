<?php
include 'common/header.php';
?>

<h1>HOw are you?</h1>
<?php



include 'common/footer.php';
if (session_status() == PHP_SESSION_NONE && $_SESSION["logged_in"] !== true){
    echo "<h1>is session out</h1>";
}
print_r($_SESSION);
echo "----------<br>";
if ($_SESSION["logged_in"]){
    var_dump($_SESSION["logged_in"]);
}
echo "----------<br>";
?>
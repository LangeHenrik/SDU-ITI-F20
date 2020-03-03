<?php
    $servername = "localhost";
    $username = "root";
    $dbname = "iti";
if (is_dir("C:\Users\madsw")) {
    $password = "password";
}
else if (is_dir("C:\Users\Peter Hansen")){
    $password = "mysql";
}
else if (is_dir("C:\Users\martin")){
    $password = "mysql";
}
else {
    $password = "Hej Henrik skriv dit pw her...";    
}
?>

<?php
require_once 'db_config.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    /*$sql = "CREATE TABLE MyGuests (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    pass VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";*/


    //sql to insert new user to the table
    $user_register = "ahoj";
    $pass_register = "ahojky";
    $table_name = "MyGuests";

    $sql = "INSERT INTO " . $table_name . " (name, pass)
VALUES ('" . $user_register . "', '" . $pass_register . "');";


    //show sql in console
    echo $sql . "\n";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table MyGuests created successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
echo "\nend";

$conn = null;
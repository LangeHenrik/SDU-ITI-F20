<?php
$servername = "localhost:3306";
$username = "root";
$password = "Svanda112";
$dbname = "mysql";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
/*$sql = "CREATE TABLE MyGuests (
id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
pass VARCHAR(30) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";*/

$user_register = "ahoj";
$pass_register = "ahojky";
$table_name = "MyGuests";

//sql to insert new user to the table
$sql = "INSERT INTO ". $table_name ." (name, pass)
VALUES ('". $user_register ."', '". $pass_register ."');";

echo $sql."\n";

if ($conn->query($sql) === TRUE) {
    echo "Process successfully";
} else {
    echo "Error" . $conn->error;
}

echo "\nend";

$conn->close();
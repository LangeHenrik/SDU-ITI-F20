<?php 
if (isset($_POST["signupsubmit"])) {
	
	require "db_config.php";

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	/* Encrypt the password*/
	$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

	    $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('$username', '$email', '$hashedPwd')";

    $conn->exec($sql); 

}

$conn = null;

 ?>
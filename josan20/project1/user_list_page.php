<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
// Check input errors before inserting in database

// Prepare an insert statement
$sql = "SELECT * FROM MyGuests";

if ($stmt = $pdo->prepare($sql)) {
    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        // Redirect to login page
//        header("location: login.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }

}


// Close connection
unset($pdo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of users</title>
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
</head>
<body>
<!--NAVIGATION BAR-->
<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
    }

    li a {
        display: block;
        color: #000;
        padding: 8px 16px;
        text-decoration: none;
    }

    /* Change the link color on hover */
    li a:hover {
        background-color: #555;
        color: white;
    }

    .active {
        background-color: #4CAF50;
        color: white;
    }
</style>
<nav>
    <ul>
        <li><a href="welcome.php">Welcome</a></li>
        <li><a href="login.php">LogIn</a></li>
        <li><a href="register.php">Registration</a></li>
        <li><a href="upload_page.php">Upload</a></li>
        <li><a href="image_feed_page.php">Image Feed</a></li>
        <li><a class="active" href="user_list_page.php">User list</a></li>
    </ul>
</nav>
<div class="wrapper">
    <h2>List of users</h2>
    <p>
        <a href="logout.php">Sign Out of Your Account</a>
    </p>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['username'] . "<br>";
    }

    // Close statement
    unset($stmt);
    ?>

</div>
</body>
</html>
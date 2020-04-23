<?php

session_start();

if(isset($_SESSION['username'])){
    echo "<br><a href='logout.php'><input type=button value=Logout name=logout></a>";
}
else{
    echo "<script> alert('Please login to procede! Please check your credentials.') </script>";
    echo "<script> location.href = 'index.php' </script>";
}


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="extfiles/styling.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Page</title>
<form action="qanuu18/mvc/public/home/menu">
    <input type="submit" value="Go to main menu" />
</form>
</head>
<body>





<?php

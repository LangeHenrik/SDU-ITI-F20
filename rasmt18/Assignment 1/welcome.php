<?php

$username="username";
$password='Passw0rd8';

session_start();

if(isset($_SESSION['username'])){
    echo "<h1>Welcome ".$_SESSION['username']."</h1>";
    echo "<a href='product.php'>Product</a><br>";
    echo "<br><a href='logout.php'><input type=button value=logout name=logout></a>";
}
else{
    if($_POST['username']==$username && $_POST['password']==$password){
        $_SESSION['username']=$username;
        echo "<script>location.href='welcome.php'</script>";
    }
    else{
        echo "<script>alert('username or password incorrect!')</script>"; 
        echo "<script>location.href='login.php'</script>";
    }
}
?>
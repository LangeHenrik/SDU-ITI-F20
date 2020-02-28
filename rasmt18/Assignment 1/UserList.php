<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styling.css">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <script src="./javascript/Menu.js"></script>
        <h1>Here you can see a list of all the users registrated to this page</h1>
        <?php
    require_once 'db_config.php';
        try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
        $password,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $stmt = $conn->prepare("Select username from user");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetchAll();
            foreach($result as $row) {
                echo "<p>$row[username]</p>";
                echo "<br>";
            }
        } 
        catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
    $conn = null;
    ?>
    </div>
</body>
</html> 
<?php

// $username="username"; //hardvoded TODO get password from input
// $password='Passw0rd8'; //hardcoded TODO get password from input

// session_start();

// if(isset($_SESSION['username'])){
//     //echo "<h1>Welcome ".$_SESSION['username']."</h1>";
//     //echo "<a href='product.php'>Product</a><br>";
//     //echo "<br><a href='logout.php'><input type=button value=logout name=logout></a>";
// }
// else{
//     if($_POST['username']==$username && $_POST['password']==$password){
//         $_SESSION['username']=$username;
//         echo "<script>location.href='UserList.php'</script>";
//     }
//     else{
//         echo "<script>alert('Please login to procede! Please check your credentials.')</script>"; 
//         echo "<script>location.href='index.php'</script>";
//     }
// }
?> 
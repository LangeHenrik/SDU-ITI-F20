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
        <?php
        require_once 'db_config.php';
        try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
        $password,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $stmt = $conn->prepare("Select * from image");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetchAll();
            foreach($result as $row) {
                $str = $row[img];
                echo "<img src=".base64_encode($str)."></img>";
                echo '<img src="data:image/jpeg;base64,'.base64_decode( $result['img'] ).'"/>';
            }
        } 
        catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
    $conn = null;
    ?>
        <h1>Image Feed</h1>
        <h2>Look at all the cool images below</h2>
        <p>Header</p>
        <p>Description<p>
        <p>Contributer</p>
    </div>
</body>
</html> 

<?php

$username="username"; //hardvoded TODO get password from input
$password='Passw0rd8'; //hardcoded TODO get password from input

session_start();

if(isset($_SESSION['username'])){
    //echo "<h1>Welcome ".$_SESSION['username']."</h1>";
    //echo "<a href='product.php'>Product</a><br>";
    //echo "<br><a href='logout.php'><input type=button value=logout name=logout></a>";
}
else{
    if($_POST['username']==$username && $_POST['password']==$password){
        $_SESSION['username']=$username;
        echo "<script>location.href='ImageFeed.php'</script>";
    }
    else{
        echo "<script>alert('Please login to procede! Please check your credentials.')</script>"; 
        echo "<script>location.href='index.php'</script>";
    }
}
?>
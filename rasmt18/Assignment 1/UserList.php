<?php 
  session_start();
?>
<!DOCTYPE html>
<?php
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

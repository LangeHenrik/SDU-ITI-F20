<?php 
  session_start();
?>
<!DOCTYPE html>

<?php
    //  TODO - We have to check that the regex is fulfilled before we commit to the database,
    //  this code will just insert it without checking
    require_once 'db_config.php';
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
    $password,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $stmt = $conn->prepare("SELECT username, password FROM user");
    $stmt->execute(); 
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $result = $stmt->fetchAll();
    $tempUser = filter_var($_GET['username'], FILTER_SANITIZE_STRING);
        
    $tempPwd = filter_var($_GET['password'], FILTER_SANITIZE_STRING);
    if(isset($_SESSION['username'])){
        echo "<br><a href='logout.php'><input type=button value=Logout name=logout></a>";
      }
      else{
        foreach($result as $row) {
            if($row['username'] == $tempUser && password_verify($tempPwd, $row['password'])){
                $_SESSION['username']=$_GET['username'];
                echo "<script> location.href = 'ImageFeed.php' </script>";
            } else{
                echo "<script> alert('Please login to procede! Please check your credentials.') </script>";
                echo "<script> location.href = 'index.php' </script>";
            }
        }
}

} 
    catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styling.css">

    <title>Imagefeed</title>
</head>
<body>
    <div class="content">
        <script src="./javascript/Menu.js"></script>
        <h1>Image Feed</h1>
        <h2>Look at all the cool images below</h2>
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
        echo "<div class='image'>";
            foreach($result as $row) {
                echo "<div class='picture'><b>Title of the image:</b> <p>$row[header]</p>";
                echo "<br>";
                echo "<b>Description:</b> <p>$row[description]<p>";
                echo "<br>";
                echo "<b>Contributer:</b> <p>$row[username]<p>";
                echo "<br>";
                echo "<b>Image:</b>";
                echo "<br>";
                echo "<img src='$row[img]' alt='Uploaded picture'></img>";
                echo "<br></div>";
            }
        echo "</div>";

        } 
        catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
    $conn = null;
    ?>
    </div>
</body>
</html> 
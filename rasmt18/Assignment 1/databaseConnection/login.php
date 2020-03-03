<?php
    require_once 'config.php';
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
    $password,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $stmt = $conn->prepare("SELECT username, password FROM user");
    $stmt->execute(); 
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $result = $stmt->fetchAll();
    $tempUser = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $tempUserXSS = htmlspecialchars($tempUser);
        
    $tempPwd = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $tempPwdXSS = htmlspecialchars($tempPwd);
    if(isset($_SESSION['username'])){
        echo "<br><a href='logout.php'><input type=button value=Logout name=logout></a>";
      }
      else{
        foreach($result as $row) {
            if($row['username'] == $tempUserXSS && password_verify($tempPwdXSS, $row['password'])){
                $_SESSION['username']=$_POST['username'];
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
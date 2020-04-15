<?php
require 'db_config.php';

$results;
$conn = new PDO("mysql:host=$servername;dbname=$dbname",$dbusername,$dbpassword,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$stmt = $conn->prepare("SELECT username, header, description, image FROM image;");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$results = $stmt->fetchAll();


session_start(); 
if($_SESSION['logged_in']) : ?>


<!DOCTYPE html>
<html>
    <head>
    <title> Leroy jenkins</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <script src="ajaxcall.js"></script>
    </head>
<body>
    <div class="wrapper">        
    <div class="refreshbtn">
    <input  type="button" id="button" value="Refresh" class="button" onclick="refreshPics();" ></input> 
    </div>
    <div class="content" id="content">                                                 
    </div>
    <div class="link">
    <p><a href="Uploadpage.php"> Want to upload more pictures? Click here</a></p>
    </div>   
</body>

</html>


<?php else : ?>
    <h1> Log in please</h1>

<?php endif; 
?>

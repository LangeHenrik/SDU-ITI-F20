<?php
session_start();

require_once 'extfiles/config.php';

    if(isset($_POST['upload'])) {
        try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));


        
        $path = "images/".basename($_FILES['profileimage']['name']);
        $image = $_FILES['profileimage']['tmp_name'];
        $imageconvered = base64_encode(file_get_contents(addslashes($image)));

        $header = filter_input(INPUT_POST,"header", FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST,"description", FILTER_SANITIZE_STRING);

        $Imagefiletype = getimagesize($_FILES['profileimage']['tmp_name']);

        
        $query = $conn->prepare("INSERT INTO images (Header, Filetype, description, username, img) VALUES (:header, :imagefiletype, :description, :username, :imageconverted)");
        $query->bindParam(":header",$header);
        $query->bindParam(":imagefiletype", $Imagefiletype['mime']);
        $query->bindParam(":description",$description);
        $query->bindParam(":username",$_SESSION['username']);
        $query->bindParam(":imageconverted",$imageconvered);
        $query->execute(); 
        $query->setFetchMode(PDO::FETCH_ASSOC);
   
        if($query->rowCount()>0) {
            echo "Image uploaded to database";
            }else{
                echo "There was a problem";
            }
    } catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>

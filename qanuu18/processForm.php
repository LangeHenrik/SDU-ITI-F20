<?php 


if (isset($_POST['upload-image'])) {
session_start();
require_once 'extfiles/config.php';





try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $img = file_get_contents($_FILES['profileImage']['tmp_name']);
    $data = base64_encode($img);

    //$Image = "data:".$_FILES['profileImage']['type'].";base64,".base64_encode(file_get_contents($_FILES['profileImage']['tmp_name']));

    $stmt = $conn->prepare=("INSERT INTO image (img) VALUES (:profileImage)");
     
              
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            echo "New record created successfully";
        }
    
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
}
<?php
class Image extends Database {
	


   
    public function postImages() {
        if(isset($_POST['upload'])) {
   
        $path = "images/".basename($_FILES['profileimage']['name']);
        $image = $_FILES['profileimage']['tmp_name'];
        $imageconvered = base64_encode(file_get_contents(addslashes($image)));

        $header = filter_var($_POST['header'], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

        $Imagefiletype = getimagesize($_FILES['profileimage']['tmp_name']);

        
        $sql = "INSERT INTO images (Header, Filetype, description, username, img) VALUES (:header, :imagefiletype, :description, :username, :imageconverted)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":header",$header);
        $stmt->bindParam(":imagefiletype", $Imagefiletype['mime']);
        $stmt->bindParam(":description",$description);
        $stmt->bindParam(":username",$_SESSION['username']);
        $stmt->bindParam(":imageconverted",$imageconvered);
        $stmt->execute(); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
   
        if($stmt->rowCount()>0) {
            echo "Image uploaded to database";
            return true;
            }else{
                echo "There was a problem";
                return false;
            }
        }

    }
 
    public function apipostimages(){

// todo : GET IMAGES RELATED TO SPECIFIC USER ID FROM DATABASE.

        
    }

    public function getImages(){

        $sql = "SELECT * FROM images";
 
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while($result =  $stmt->fetch(PDO::FETCH_ASSOC)){
    
        echo "<img src='data:$result[Filetype];base64,$result[img]' alt='$result[Header]'>";
         echo "<h3>".$result["Header"]."</h3>";
         echo "<p>".$result["description"]."</p>";
         echo "<p>".$result["username"]."</p>";
    
    
        }
       $image = $stmt->fetchAll();
       return $image;

    }


    
}
?>
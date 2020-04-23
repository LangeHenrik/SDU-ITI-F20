<?php
$dbFile = '/Users/signethuesenpedersen/Documents/SDU-ITI-F20/siped18/mvc/app/core/Database.php';    //TODO
require_once $dbFile;

class Pictures extends Database{

    public function uploadPicture() 
    {
        if (isset($_POST['submit'])) {
            $name=$_POST['user_name'];
            $imgaes = $_FILES['profile']['name'];
            $tmp_dir = $_FILES['profile']['tmp_name'];
            $imagesSize = $_FILES['profile']['size'];
    
            $upload_dir = 'uploads';
            $imgExt = strtolower(pathinfo($imgaes, PATHINFO_EXTENSION));
            $valid_ext = array("png","jpeg","jpg");
            $picProfile = rand(10000, 1000000).".".$imgExt;
            move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
            $stmt=$conn->prepare('INSERT INTO images (name,image) VALUES(:username, :upic)');
            $stmt->bindParam(':username', $name);
            $stmt->bindParam(':upic', $picProfile);
    
            if ($stmt->execute()) {
                ?> 
                <script>
                    alert("new record succesfull");
                    window.location.href=('uploadpage.php');
                </script>
            <?php
            } else {
                ?> 
                <script>
                    alert("Error");
                    window.location.href=('uploadpage.php');
                </script>
            <?php
            }
        }

    }

    function getPictures()
    {

        try {
            $conn = new PDO(
                "mysql:host=$servername;dbname=$dbname",
                $username,
                $password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
    
            $stmt = $conn->prepare("SELECT * FROM picture");
    
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
    
            return $result;
        } catch (PDOException $e) {
            return "Error:" .$e->getMessage();
        }
    
        $conn = null;   
    }

}
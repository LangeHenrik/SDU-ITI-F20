<?php
class Image extends Database {
	


   
    public function postImages() {
      ///  if(isset($_POST['upload'])) {
   
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

    
 
    public function apipostimages($user_id){




$json = $_POST['json'];
$jsonec = json_decode($json);  //ENCODE MÅSKE
$username =  filter_var($jsonec->username, FILTER_SANITIZE_STRING);
$password = filter_var($jsonec->password, FILTER_SANITIZE_STRING);
$user_id = filter_var($user_id, FILTER_SANITIZE_STRING);

 $jsonec->title;

$sql = "SELECT user_id, username, password FROM user WHERE user_id = :user_id";

$stmt = $this->conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

$data = $stmt->fetch(PDO::FETCH_ASSOC);

if($suername == $result['username'] && password_verify($password,$data['password'])){

    $description = filter_var($jsonec->description, FILTER_SANITIZE_SRTING);
    $image = filter_var($jsonec->img, FILTER_SANITIZE_STRING);
    $title = filter_var($jsonec->titlle, FILTER_SANITIZE_STRING);

    


}
 

$sql = "INSERT INTO images (Header, Filetype, description, username, img) VALUES (:header, :imagefiletype, :description, :username, :imageconverted)";
$stmt = $this->conn->prepare($sql);
$stmt->bindParam(":header", $jsonec->title);


$stmt->bindParam(":imagefiletype", $Imagefiletype['mime']);
$stmt->bindParam(":description",$jsonec->description);
$stmt->bindParam(":username",$jsonec->username);
$stmt->bindParam(":imageconverted",$jsonec->image);
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

     public function picturess($user_id){

    

        $user_id = filter_var($user_id , FILTER_SANITIZE_STRING); 
         
        $sql = "SELECT * FROM images WHERE user_id = :user_id";
       

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

       // $result = $stmt->fetchAll(); //fetchAll to get multiple rows

        //print_r($result);    
       $image = $stmt->fetchAll(PDO::FETCH_ASSOC);
        


       print_r($image);
       return $image;





     }
        
        
    
    // En ny funktion som finder en brugers billeder ud fra brugerens ID Id'en er den jeg får fra get metoden
// join username  id og join usename image id og tjekt det id jeg får ind.

    public function getImages(){

        $sql = "SELECT * FROM images";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
      /*  while($result =  $stmt->fetch(PDO::FETCH_ASSOC)){
    
        echo "<img src='data:$result[Filetype];base64,$result[img]' alt='$result[Header]'>";
         echo "<h3>".$result["Header"]."</h3>";
         echo "<p>".$result["description"]."</p>";
         echo "<p>".$result["username"]."</p>";
    
    
       } */
       $image = $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $image;

    }


    public function getImagefromuser(){
 
        $sql = "SELECT * FROM images WHERE username = :username";
       

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $_SESSION['username']);
        $stmt->execute();

       // $result = $stmt->fetchAll(); //fetchAll to get multiple rows

        //print_r($result);    
       $image = $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $image;


    }





    
}
?>
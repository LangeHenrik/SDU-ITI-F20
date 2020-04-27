<?php
class Image extends Database {
	


   
    public function postImages() {
      if(isset($_POST['upload'])) {
          

           

        $path = "images/".basename($_FILES['profileimage']['name']);
          
    
        
           
      //  $path = "images/".basename($_FILES['profileimage']['name']);
        $image = $_FILES['profileimage']['tmp_name'];
        $imageconvered = base64_encode(file_get_contents(addslashes($image)));

        $header = filter_var($_POST['header'], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

        $Imagefiletype = getimagesize($_FILES['profileimage']['tmp_name']);

        if ( strlen($description) > 255 || strlen($header) > 50 || ((filesize($_FILES['profileimage']['tmp_name']) * 1.20 ) > 25021322)){
            
               return "Size of title and description is too big";
             }  
           $extensionarray = array("image/jpeg", "image/gif", "image/png");
           if (!in_array($Imagefiletype['mime'],$extensionarray)){

                    echo "Image type can only be JPEG , GIF OR PNG";
                    return false;
                
           }

        
        $sql = "INSERT INTO images (Header, Filetype, description, username, img, user_id) VALUES (:header, :imagefiletype, :description, :username, :imageconverted, :user_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":header",$header);
        $stmt->bindParam(":imagefiletype", $Imagefiletype['mime']);
        $stmt->bindParam(":description",$description);
        $stmt->bindParam(":username",$_SESSION['username']);
        $stmt->bindParam(":imageconverted",$imageconvered);
        $stmt->bindParam(":user_id",$_SESSION["user_id"]);
        $stmt->execute(); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
   
        if($stmt->rowCount()>0) {
            echo "Image uploaded to database";
            return true;
            }else{
                echo "There was a problem";
                return false;
            }
        } else {   

             return false;

        }
    }

    
 
    public function apipostimages($user_id){

//$test = '{"image": "R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs","title": "some title", "description":"my description","username":"Qadar3","password":"Qadar3"}';



$json = $_POST['json'];
$jsonec = json_decode($json);
//var_dump($json);  //ENCODE MÅSKE
$username =  filter_var($jsonec->username, FILTER_SANITIZE_STRING);
$password = filter_var($jsonec->password, FILTER_SANITIZE_STRING);
$user_id = filter_var($user_id, FILTER_SANITIZE_STRING);

 
$sql = "SELECT user_id, username, password FROM userinfo WHERE user_id = :user_id";

$stmt = $this->conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

$data = $stmt->fetch(PDO::FETCH_ASSOC);

if($username == $data['username'] && password_verify($password,$data['password'])){

    $description = filter_var($jsonec->description, FILTER_SANITIZE_STRING);
       $file = base64_decode($jsonec->image);

     if (!imagecreatefromstring($file)){

        return " File is not image";

     } 
     $filetype = getimagesizefromstring($file);



    $title = filter_var($jsonec->title, FILTER_SANITIZE_STRING);


    if( empty($description)|| empty($title) ) {

     } else if ( strlen($description) > 255 || strlen($title) > 50 ){
        echo "Size of title and description is too big";


        }
    

    else{



 $sql = "INSERT INTO images (Header, description, user_id, img, username, Filetype) VALUES (:header, :description, :user_id, :imageconverted, :username, :imagefiletype)";
$stmt = $this->conn->prepare($sql);
$stmt->bindParam(":header", $title);
$stmt->bindParam(":imagefiletype", $filetype['mime']);
$stmt->bindParam(":description",$description);
$stmt->bindParam(":user_id",$user_id);
$stmt->bindParam(":imageconverted",$jsonec->image);
$stmt->bindParam(":username",$username);
$stmt->execute(); 
$stmt->setFetchMode(PDO::FETCH_ASSOC);

        if($stmt->rowCount()>0) {
            
      $imageid = $this->conn->lastinsertid("imageid");
      return array("imageid" =>$imageid);
    }else{
        echo "There was a problem";
        return false;
    }


    }
}
    }


     public function picturess($user_id){

    

        $user_id = filter_var($user_id , FILTER_SANITIZE_STRING); 
         
        $sql = "SELECT Header as title, Filetype, imageid, description, img as image FROM images WHERE user_id = :user_id";
       

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

       // $result = $stmt->fetchAll(); //fetchAll to get multiple rows
        //(PDO::FETCH_ASSOC)
        //print_r($result);    
       $image = $stmt->fetchAll(PDO::FETCH_ASSOC);
        


      // print_r($image);
             for ($i = 0; $i< count($image); $i++){
             $image[$i]['imageid'] = (int) $image[$i]['imageid'];
             unset($image[$i][0]); unset($image[$i][1]);
             unset($image[$i][2]); unset($image[$i][3]);

             }


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
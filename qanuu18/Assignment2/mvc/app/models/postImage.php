<?php
class User extends Database {
	
	public function login($username){
		$sql = "SELECT username, password FROM users WHERE username = :username";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetchAll(); //fetchAll to get multiple rows

		print_r($result);


		//todo: make an actual login function!!
		return true;
    }
    
    public function postImages() {

   
        $path = "images/".basename($_FILES['profileimage']['name']);
        $image = $_FILES['profileimage']['tmp_name'];
        $imageconvered = base64_encode(file_get_contents(addslashes($image)));

        $header = filter_input(INPUT_POST,"header", FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST,"description", FILTER_SANITIZE_STRING);

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
            }else{
                echo "There was a problem";
            }

    }
}
?>
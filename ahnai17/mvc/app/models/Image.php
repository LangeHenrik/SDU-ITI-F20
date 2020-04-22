<?php

class Image extends Database {
    
    public function getImages() {
        $sql='SELECT image_id, Title, Description, Image_base64 FROM images Where user_id=:id';
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':id',$_SESSION['id']);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $images=$stmt->fetchAll();
        return $images;
    }
    public function uploadImage(){
        if(isset($_FILES['upload'])){
            $errors= array();
            $file_name = filter_var($_FILES['upload']['name'], FILTER_SANITIZE_STRING);
            $file_size =$_FILES['upload']['size'];
            $file_tmp;
            $file_type=strtolower(pathinfo(basename($file_name),PATHINFO_EXTENSION));
            if($file_size > 2097152){
                $errors[]='File size must be 2 MB or less';
                echo 'error image size is too big';
                return false;
            } else {
                $image_64 = base64_encode(file_get_contents($_FILES['upload']['tmp_name']));
                $image_64 = 'data:image/' . $file_type . ';base64,' . $image_64;
                $title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
                $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
                $description = substr($description, 0, 100);
                $stmt = $this->conn->prepare("INSERT INTO images (Title, 
                                            Description, Image_base64, user_id, Image_name)
                                            VALUES(:Title, :Description, :Image_base64, :user_id, :image_name)");
                $stmt->bindParam(':user_id', $_SESSION["id"]);
                $stmt->bindParam(':Title', $title);
                $stmt->bindParam(':image_name',$file_name);
                $stmt->bindParam(':Description', $description);
                $stmt->bindParam(':Image_base64', $image_64);
                $stmt->execute();
                return true;
            }  
        }
    }
    public function APIgetImagesfromUser($username,$id) {
        $user_id=$id;
        $sql = "SELECT Image_base64 AS 'image', Title, Description, user_id"
        . " FROM images, users WHERE users.id=:userid";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':userid', $user_id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }
    public function APIpostImages($id) {
        $jsdata=json_decode($_POST['json']);
        $username=filter_var($jsdata->username, FILTER_SANITIZE_STRING);
        $password=filter_var($jsdata->password , FILTER_SANITIZE_STRING);
        $user_id=(int)$id;
        $title=filter_var($jsdata->title, FILTER_SANITIZE_STRING);
        $description=filter_var($jsdata->description, FILTER_SANITIZE_STRING);
        $image_64;
        preg_match("/^(data:image\/([a-zA-Z]{3,4});base64,)([A-Za-z0-9+\/]*={0,2})$/",$jsdata->image , $matches);
		if ( ($matches[0] == "") || ( strlen($jsdata->image) != strlen($matches[0]) ) ) {
			return "The data at ['jason']->image of type base64. Contains invalid base64 code.";
		}
        if ( base64_decode($matches[3], true) === false ) {
			return "The base64 data in ['jason']->image is invalid.";
            }
        $image_64 = $matches[0];
        $sql="SELECT password FROM users WHERE id=:user_id AND username = :username";
        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        if ($result && password_verify($password, $result['password'])) {
            $stmt= $this->conn->prepare("INSERT INTO images (Title, 
                                        Description, Image_base64, user_id)
                                        VALUES(:Title, :Description, :Image_base64, :user_id)");
            $stmt->bindParam(':user_id', $_SESSION["id"]);
            $stmt->bindParam(':Title', $title);
            $stmt->bindParam(':Description', $description);
            $stmt->bindParam(':Image_base64', $image_64);
            $sql2 = "SELECT LAST_INSERT_ID()AS 'image_id' FROM images ";
            $stmt2 = $this->conn->prepare($sql2);
            $stmt2->execute();
            $stmtw->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }
    }
}


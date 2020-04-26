<?php

class Image extends Database {
	
    public function upload ()
    {
        $statusMsg = "error"; 
        $imageHeader = filter_var($_POST["imageHeader"], FILTER_SANITIZE_SPECIAL_CHARS);
        $imageDescription = filter_var($_POST["imageDescription"], FILTER_SANITIZE_SPECIAL_CHARS);
        $userID = $_SESSION["user_id"];
        if ($imageHeader == "" || $imageDescription == "")
        {
            if ($imageHeader == "")
            {
                $statusMsg = "Sorry, image needs a header";
            }
            else if ($imageDescription == "")
            {
                $statusMsg = "Sorry, image needs a Description";
            }
            return ["false", $statusMsg];
        }
        if(!empty($_FILES["imageFile"]["name"]))
        {
            // Get file info 
            $fileName = basename($_FILES["imageFile"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF'); 
            if(in_array($fileType, $allowTypes))
            { 
                $imageBase64 = base64_encode(file_get_contents(($_FILES["imageFile"]["tmp_name"])));
                $image = "data:image/".$fileType.";base64,".$imageBase64; 
                // Insert image content into database 
                $sql = "INSERT INTO image(title, description, image, upload_user_id) VALUES (:title, :description, :image, :upload_user_id)";
		        $stmt = $this->conn->prepare($sql);
                $stmt->bindValue(":title",$imageHeader);
                $stmt->bindValue(":description",$imageDescription);
                $stmt->bindValue(":image",$image);
                $stmt->bindValue(":upload_user_id",$userID);
                $stmt->execute();

                $statusMsg = "File uploaded successfully."; 
                return ["true", $statusMsg];
            }
            else
            { 
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
            } 
        } else
        { 
            $statusMsg = 'Please select an image file to upload.'; 
        } 
		return ["false", $statusMsg];
    }

    private function getUsername ($userID)
    {
        $sql = "SELECT username FROM user WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":user_id", $userID);
		$stmt->execute();
        $user = $stmt->fetch();
        if ($user === false)
        {
            return "User no longer exists";
        }
        else 
        {
            return $user["username"];
        } 
    }

	public function getAllImages () {

		$sql = "SELECT * FROM image";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

        $images = $stmt->fetchAll();

        $result = array();
        for ($i = 0; $i < sizeof($images); $i ++)
        {
            $result[$i]["username"] = $this->getUsername($images[$i]["upload_user_id"]);//,$users["user_id"])];
            $result[$i]["imageHeader"] = $images[$i]["title"];
            $result[$i]["imageDescription"] = $images[$i]["description"];
            $result[$i]["imageData"] = $images[$i]["image"];
        }
		return $result;
    }

    public function APIgetUserImage($userID)
    {
        $userID = filter_var($userID, FILTER_SANITIZE_STRING);
        $sql = "SELECT image, title, description FROM image WHERE upload_user_id = :upload_user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":upload_user_id", $userID);
		$stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function APIuploadImage($userID)
    {
        $jsonVar = json_decode($_POST["json"], true);
        if (!(isset($jsonVar["image"]) && isset($jsonVar["title"]) && isset($jsonVar["description"]) ))
        {
            die();
        }
        $imageHeader = filter_var($jsonVar["title"], FILTER_SANITIZE_SPECIAL_CHARS);
        $imageDescription = filter_var($jsonVar["description"], FILTER_SANITIZE_SPECIAL_CHARS);
        $image = filter_var($jsonVar["image"], FILTER_SANITIZE_SPECIAL_CHARS);
        $userID = filter_var($userID, FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "INSERT INTO image(title, description, image, upload_user_id) VALUES (:title, :description, :image, :upload_user_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":title",$imageHeader);
        $stmt->bindValue(":description",$imageDescription);
        $stmt->bindValue(":image",$image);
        $stmt->bindValue(":upload_user_id",$userID);
        $stmt->execute();
        
        $sql = "SELECT MAX(image_id) FROM image";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
		 
		return "image_id:".$result["MAX(image_id)"];

    }
}

?>

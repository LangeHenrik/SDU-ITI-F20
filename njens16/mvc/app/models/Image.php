<?php

class Image extends Database {
	
    public function upload ()
    {
        $imageHeader = filter_var($_POST["imageHeader"], FILTER_SANITIZE_SPECIAL_CHARS);
        $imageDescriptoin = $filter_var(_POST["imageDescrip"], FILTER_SANITIZE_SPECIAL_CHARS);
        $imageDescriptoin = $filter_var(_POST["imageDescrip"], FILTER_SANITIZE_SPECIAL_CHARS);
		$sql = "SELECT username, password FROM user WHERE username = :username";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetch(); 

        if ($result === false)
        {
            return false;
        } 
        if (password_verify($password, $result["password"]))
        {
            return true;
        }


        $statusMsg = 'error'; 
        if(!empty($_FILES["image"]["name"]))
        {
            // Get file info 
            $fileName = basename($_FILES["image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes))
            { 
                $image = $_FILES['image']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image)); 
         
                // Insert image content into database 
                $insert = $db->query("INSERT into images (image, uploaded) VALUES ('$imgContent', NOW())"); 
             
                if($insert)
                { 
                    $status = 'success'; 
                    $statusMsg = "File uploaded successfully."; 
                }
                else
                { 
                    $statusMsg = "File upload failed, please try again."; 
                }  
            }
            else
            { 
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
            } 
        }
        else
        { 
            $statusMsg = 'Please select an image file to upload.'; 
        } 
		return false;
    }

	public function getAll () {

		$sql = "SELECT username FROM user";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

        $result = $stmt->fetchAll();
		return $result;
    }
}

?>

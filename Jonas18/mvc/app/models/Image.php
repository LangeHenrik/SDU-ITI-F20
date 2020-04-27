<?php
require_once 'User.php';

class Image extends Database {
    
    public $usermodel;

	public function __construct()
	{
		parent :: __construct();
		$this->usermodel = new User();
	}
    
	public function uploadimage($username, $title, $image, $description){
        $sql = "INSERT INTO image (user_id, title, image, description) VALUES ((SELECT user_id FROM user WHERE username= :username ),:title,:image,:description););";
        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }

    public function getAllImages(){
        $sql ="SELECT user_id, title, image, description from image;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $imageResult = $stmt->fetchAll();
        return $imageResult;
    }

    public function getPictures($userid){
        $sql ="SELECT * from image WHERE user_id = :user_id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $userid);
        $stmt->execute();
        $imageResult = $stmt->fetchAll();
        return $imageResult;
    }

    public function insertImageByUserID ($userid, $json){
        $jsonRequest =json_decode($json);
        $username = filter_var($jsonRequest->username, FILTER_SANITIZE_STRING);
        $password = filter_var($jsonRequest->password, FILTER_SANITIZE_STRING);
        if ($this->usermodel->login($username, $password)) {
			$title = $jsonRequest->title;
			$image = $jsonRequest->image;
			$description = $jsonRequest->description;
			$this->uploadimage($username, $title, $image, $description);
        } 
    }
    public function getLatestImageID($userid)
	{
		$sql = "SELECT image_id FROM image WHERE user_id = " . $userid . " ORDER BY image_id DESC LIMIT 1;";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();
        
		return $result;
	}




    
}
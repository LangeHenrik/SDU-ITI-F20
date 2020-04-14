<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/jacso18/mvc/app/core/Database.php';

require_once 'User.php';

class Post extends Database
{
	public $usermodel;

	public function __construct()
	{
		parent :: __construct();
		$this->usermodel = new User();
	}

	public function getAllPostsByUserID($user_id)
	{
		$sql = "SELECT * FROM posts WHERE user_id = :user_id ORDER BY image_id DESC LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();

		$result = $stmt->fetchAll();
		return $result;
	}

	public function getAllPosts()
	{
		$sql = "SELECT username, title, image, description, timestamp FROM users, posts WHERE posts.user_id = users.user_id ORDER BY timestamp DESC;";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;
	}

	public function apiPost($user_id, $title, $image, $description)
	{
		$sql = "INSERT INTO posts (user_id, title, image, description) VALUES (:userid ,:title,:image,:description);";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':userid', $user_id);
		$stmt->bindParam(':title', $title);
		$stmt->bindParam(':image', $image);
		$stmt->bindParam(':description', $description);
		$stmt->execute();
	}

	public function getLatestImageID($user_id)
	{
		$sql = "SELECT image_id FROM posts WHERE user_id = " . $user_id . " ORDER BY image_id DESC LIMIT 1;";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();
		$image_id = json_encode($result, JSON_PRETTY_PRINT);
		echo $image_id;
		return $image_id;
	}

	public function createPost($username, $title, $image, $description)
	{
		$sql = "INSERT INTO posts (user_id, title, image, description) VALUES ((SELECT user_id FROM users WHERE username= :username ),:title,:image,:description););";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':title', $title);
		$stmt->bindParam(':image', $image);
		$stmt->bindParam(':description', $description);
		$stmt->execute();
	}

	public function getPostJson($id)
	{
		$images = $this->getAllPostsByUserID($id);
		$imageObjects = array();

        foreach ($images as $image) {
            $jsonAttributeName['image_id'] = $image['image_id'];
            $jsonAttributeName['title'] = $image['title'];
            $jsonAttributeName['description'] = $image['description'];
            $jsonAttributeName['image'] = $image['image'];
            $imageObjects[] = $jsonAttributeName;
        }

        echo json_encode($imageObjects, JSON_PRETTY_PRINT);

		//echo json_encode($json, JSON_PRETTY_PRINT);
	}

	public function postJson($id, $json)
	{
		$details = json_decode($json);
		$username = filter_var($details->username, FILTER_SANITIZE_STRING);
		$password = filter_var($details->password, FILTER_SANITIZE_STRING);
		if ($this->usermodel->isUser($username, $password)) {
			$title = $details->title;
			$image = $details->image;
			$description = $details->description;
			$this->apiPost($id, $title, $image, $description);
		} 
		return $this->getLatestImageID($id);
	}
}

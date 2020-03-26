<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/jacso18/mvc/app/core/Database.php';

class Post extends Database
{
 

	public function getAllPostsByUserID($user_id)
	{
		$sql = "SELECT * FROM posts WHERE user_id = :user_id ";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

	public function getAllPosts()
	{
		$sql = "SELECT username, title, image, COMMENT, timestamp FROM users, posts WHERE posts.user_id = users.user_id ORDER BY timestamp DESC;";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;
	}

	public function createPost($username, $title, $image, $comment)
	{
		$sql = "INSERT INTO posts (user_id, title, image, COMMENT) VALUES ((SELECT user_id FROM users WHERE username= :username ),:title,:image,:comment););";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':title', $title);
		$stmt->bindParam(':image', $image);
		$stmt->bindParam(':comment', $comment);
		$stmt->execute();
	}
}

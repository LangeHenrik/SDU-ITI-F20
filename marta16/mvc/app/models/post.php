<?php

class PostModel extends DB
{

	public $id;
	public $username;
	public $title;
	public $description;
	public $image;
	public $file_size;

	// -- PUBLIC METHODS ------------------------------------------

	public function upload()
	{
		// file size restriction
		if ($this->file_size > 2097152)
			return "File too large. File must be less than 2 megabytes.";

		// file type restriction
		// https://stackoverflow.com/a/53853171
		$allowed_types = ["png", "jpg", "jpeg"];
		if (!in_array(str_replace(["data:image/", ";", "base64"], ["", "", "",], explode(",", $this->image)[0]), $allowed_types))
			return "File is not of allowed image type.";

		// insert post into database
		try {

			// prepare query
			$query = self::$db->prepare("INSERT INTO posts(username, title, description, img) VALUES (:username, :title, :description, :image)");

			// bind parameters (sanitize)
			$query->bindParam(":username", $this->username);
			$query->bindParam(":title", $this->title);
			$query->bindParam(":description", $this->description);
			$query->bindParam(":image", $this->image);

			// execute query
			$query->execute();

			// record assigned id
			$this->id = self::$db->lastInsertId();
			return true;


		} catch (PDOException $e) {

			return $e->getMessage();

		}

	}

	// -- STATIC METHODS ------------------------------------------

	static function from_JSON($json)
	{
		$post = new PostModel();
		$data = json_decode($json, true);

		foreach ($data as $key => $value)
			$post->{$key} = filter_var($value, FILTER_SANITIZE_STRING);

		return $post;
	}

	static function from_POST(string $username)
	{
		$post = new PostModel();

		$post->username = $username;
		$post->title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
		$post->description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);

		// get image data from post
		$file = file_get_contents($_FILES["image"]["tmp_name"]);

		// create base64 blob from uploaded file
		$path = $_FILES["image"]["tmp_name"];
		$type = $_FILES["image"]["type"];
		$data = file_get_contents($path);
		$blob = "data:" . $type . ";base64," . base64_encode($data);

		// assign image and compute size
		$post->image = $blob;
		$post->file_size = (int)(strlen(rtrim($post->image, "=")) * 3 / 4);

		return $post;
	}

	static function get_all()
	{
		try
		{
			// get all posts
			$data = self::$db->query("SELECT * FROM posts")->fetchAll();

			// create array of posts
			$posts = array_map(function($row) {

				$post = new PostModel();

				$post->id = $row["id"];
				$post->username = $row["username"];
				$post->title = $row["title"];
				$post->description = $row["description"];
				$post->image = $row["img"];
				
				return $post;
				
			}, $data);

			return $posts;

		} catch (PDOException $e) {
			return false;
		}
	}

	static function get_all_from_username($username)
	{
		try
		{
			// query and fetch
			$query = self::$db->prepare("SELECT * FROM posts WHERE username = :username");
			$query->bindParam(":username", $username);
			$query->execute();
			$data = $query->fetchAll();

			// create array of posts
			$posts = array_map(function($row) {

				$post = new stdClass();
				
				$post->image = $row["img"];
				$post->title = $row["title"];
				$post->description = $row["description"];
				
				return $post;
				
			}, $data);

			return $posts;
		
		} catch (PDOException $e) {
			return false;
		}
	}

}
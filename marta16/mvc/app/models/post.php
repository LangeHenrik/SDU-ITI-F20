<?php

class PostModel extends DB
{

	public $username;
	public $title;
	public $description;
	public $img;

	static function get_all()
	{
		try
		{
			// get all posts
			$data = self::$db->query("SELECT * FROM posts")->fetchAll();

			// create array of posts
			$posts = array_map(function($row) {

				$post = new PostModel();

				$post->username = $row["username"];
				$post->title = $row["title"];
				$post->description = $row["description"];
				$post->img = $row["img"];
				
				return $post;
				
			}, $data);

			// encode and return as JSON
			return $posts;
			// return json_encode($posts);
		
		} catch (PDOException $e) {
			return false;
		}
	}
}
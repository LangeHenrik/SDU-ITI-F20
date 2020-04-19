<?php

class FeedController extends Controller
{
	public function index()
	{
		// default behaviour
		self::redirect("/feed/list");	
	}

	public function list()
	{
		// include post model
		$this->model("post");

		// fetch all posts
		$posts = PostModel::get_all();

		// populate view
		$data["posts"] = $posts;

		// load view
		$this->view("feed/list", $data);
	}

	public function upload()
	{
		$this->model("post");

		// upload page (GET)
		if (self::is_get())
		{
			$this->view("feed/upload");
			return;
		}

		// post upload (POST)
		if (self::is_post())
		{
			// create new post object from POST-ed data
			$post = PostModel::from_POST(self::session_username());

			// upload post
			if (($err = $post->upload()) === true)
			{
				self::redirect("/feed/list");
			}
			// something went wrong
			else
			{
				$data["error"] = "Upload failed: $err";
				$this->view("feed/upload", $data);
			}
		}
		
	}
}
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

	}
}
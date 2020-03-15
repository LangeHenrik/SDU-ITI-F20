<?php

class HomeController extends Controller
{
	public function index()
	{
		// create user model object
		$user = $this->model("user");
		$data = [];

		// load user-data if logged in
		if (self::is_SESSION_LOGGED_IN())
		{
			$user->fetch(self::SESSION_USERNAME());
			$data["user"] = $user;
		}

		// load view
		$this->view("home/index", $data);
	}
}
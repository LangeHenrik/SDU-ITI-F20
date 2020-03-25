<?php

class ApiController extends Controller
{
	public function __construct()
	{
		header("Content-Type: application/json");
	}

	public function index()
	{
		echo "This is an API.";
	}

	public function users($cmd = "", $user = "", $body = "")
	{
		// include user model
		$this->model("user");

		switch ($cmd)
		{
			case "list":

				// return JSON with user array
				$users = UserModel::list();
				echo json_encode($users);
				return;

			case "get":

				echo "Getting user $user!";
				return;

			case "update":

				// should probably be read from $_POST
				echo "Time to update $user with the data: $body.";
				return;

			case "hyphen_test":

				echo "Just testing the 'hyphen-test' method case.";
				return;

			default:

				echo "No API command was specified for the 'users()' method.";
		}
	}
}
<?php

class ApiController extends Controller
{
	public function __construct()
	{
		header("Content-Type: application/json");
	}

	public function index()
	{
		echo "Default API response.";
	}

	public function users($cmd = "", $user_id = "", $body = "")
	{
		// include user model
		$this->model("user");

		// GET localhost:8080/xx/mvc/public/api/users
		if ($cmd == "" and self::is_get())
		{
			$users = UserModel::get_all_less();
			echo json_encode($users);
			return;
		}
	}

	public function pictures($cmd = "", $user_id = "", $body = "")
	{
		// include user and post model
		$this->model("user");
		$this->model("post");

		// GET localhost:8080/xx/mvc/public/api/pictures/user/<user_id>
		if ($cmd == "user" && self::is_get())
		{

			// get username associated with user_id
			if (($username = UserModel::get_username_from_user_id($user_id)) === false)
			{
				echo "No user with the specified user_id exists.";
				return false;
			}

			// get posts from associated username
			$posts = PostModel::get_all_from_username($username);
			echo json_encode($posts);

			return;
		}

		// POST localhost:8080/xx/mvc/public/api/pictures/user/<user_id>
		if ($cmd == "user" && self::is_post())
		{
			// get and decode posted JSON
			$json = file_get_contents("php://input");
			$data = json_decode($json);

			// authenticate user
			$user = new UserModel();
			if (!$user->authenticate($data->username, $data->password))
			{
				echo "Authentication failed.";
				return false;
			}

			// check if user_id's match
			if ($user_id != $user->id)
			{
				echo "Mismatch: user_id in URL ($user_id) does not match user_id of username specified in JSON ($user->id).";
				return false;
			}

			// compose post from JSON
			$post = PostModel::from_JSON($json);

			// upload post
			if (($err = $post->upload()) === true)
				echo json_encode(array("image_id" => $post->id));

			// something went wrong
			else
				echo "Upload failed: $err";
			
			return;
		}

	}
}
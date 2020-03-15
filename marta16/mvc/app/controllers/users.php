<?php

class UsersController extends Controller
{
	public function index()
	{
		// default behaviour
		self::REDIRECT("/users/login");	
	}

	public function login()
	{
		// form specification
		$data["form"] = "login";
		
		// login landing page
		if (self::is_GET())
		{
			$this->view("users/index", $data);
			return;
		}

		// user login (POST)
		if (self::is_POST())
		{
			// filter input
			$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

			// create user model
			$user = $this->model("user");
			
			// authenticate user
			if ($user->authenticate($username, $password))
			{
				session_unset();
				$_SESSION["logged_in"] = true;
				$_SESSION["username"] = $username;
				self::REDIRECT_HOME();
			}
			else
			{
				$data["error"] = "Authentication failed.";
				$this->view("users/index", $data);
			}

		}
	}

	public function logout()
	{
		session_unset();
		self::REDIRECT_HOME();
	}

	public function register()
	{
		// form specification
		$data["form"] = "register";
		
		// register landing page
		if (self::is_GET())
		{
			$this->view("users/index", $data);
			return;
		}

		// user registration (POST)
		if (self::is_POST())
		{

			// create user model
			$user = $this->model("user");

			// fetch and filter values from POST data
			$user->username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
			$user->name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
			$user->email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
			$user->phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);

			// hash password
			$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

			// register user
			// !is_null($my_array = wp_get_category($id)
			if (($err = $user->create($hash)) === true)
			{
				self::REDIRECT("/users/login");
			}
			// something went wrong
			else
			{
				$data["error"] = "Registration failed: $err.";
				$this->view("users/index", $data);
			}

		}
	}
}
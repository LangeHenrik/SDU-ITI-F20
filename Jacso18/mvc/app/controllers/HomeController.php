<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/jacso18/mvc/app/services/UtilityFunctions.php';

class HomeController extends Controller
{
	private $utility;

	public function __construct()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$this->utility = new UtilityFunctions();
	}

	public function index($param)
	{
		/* 		//This is a proof of concept - we do NOT want HTML in the controllers!
 		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
			// redirect to front page
		} else { */
		header('Location: /jacso18/mvc/public/home/login');
		/* } */
	}

	public function other($param1 = 'first parameter', $param2 = 'second parameter')
	{
		$user = $this->model('User');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('home/index', $viewbag);
	}

	public function restricted()
	{
		echo 'Welcome - you must be logged in';
	}

	public function login()
	{
		$this->view('home/login');

		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
			$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
			$users = $this->model('User')->getUserFromUsername($username);
			foreach ($users as $user) {
				$hash = $user['password'];
				if ($user['username'] == $username && password_verify($password, $hash)) {
					$_SESSION['logged_in'] = true;
					$_SESSION['username'] = $username;
					echo 'succes';
					header('Location: /jacso18/mvc/public/home/image_feed');
				} else {
					header('Location: /jacso18/mvc/public/home/login');
				}
			}
		}
	}

	public function logout()
	{
		session_unset();
		header('Location: /jacso18/mvc/public/home/login');
	}

	public function create_account()
	{
		$this->view('home/create_account');

		if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
			$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

			if ($this->utility->regexCheck($username, $password, $email)) {
				if (sizeof($this->model('User')->getUserFromUsername($username)) <= 0) {
					$this->model('User')->createUser($username, $email, password_hash($password, PASSWORD_DEFAULT));
					echo 'user created';
					header('Location: /jacso18/mvc/public/home/create_account');
				} else {
					echo 'User already exists';
					return false;
				}
			} else {
				return false;
			}
		}
	}

	public function image_feed()
	{
		$this->view('home/image_feed');
		$this->model('Post')->getAllPosts();
	}

	public function upload()
	{
		$this->view('home/upload');

		if (isset($_POST['upload'])) {
			/* $usercontroller = new UserController(); */
			$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
			$comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_STRING);

			$name = $_FILES['filetoupload']['name'];
			$target_file = basename($_FILES["filetoupload"]["name"]);
			// Select file type
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			// Valid file extensions
			$extensions_arr = array("jpg", "jpeg", "png", "gif");

			// Check extension
			if (in_array($imageFileType, $extensions_arr)) {

				// Convert to base64 
				$image_base64 = base64_encode(file_get_contents($_FILES['filetoupload']['tmp_name']));
				$image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
				// Insert record
				$this->model('Post')->createPost($_SESSION['username'], $title, $image, $comment);
			} else {
				echo 'The file has to be either jpg, jpeg, png or gif';
			}
		}
	}

	public function users()
	{
		$users = $this->model('User')->getAll();
		$viewbag['users'] = $users;
		$this->view('home/users', $viewbag);
	}





	public function loggedout()
	{
		echo 'You are now logged out';
	}
}

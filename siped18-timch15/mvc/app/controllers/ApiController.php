<?php

class ApiController extends Controller
{
	public function __construct()
	{
		header('Content-Type: application/json');
		//check api-key?
		//check username and password?
		//or die();
	}

	public function index($param)
	{
		echo " Commands:
		\n users
		\n pictures/user/ID";
	}

	public function users()
	{
		$users = $this->model('User')->getAllUsers();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

	public function pictures($user, $user_id)
	{
		if ($this->get()) {
			$picture = $this->model('Picture')->getPicture($user_id);
			echo json_encode($picture, JSON_PRETTY_PRINT);
		} elseif ($this->post()) {
			$postArray = json_decode($_POST['json']);
			$image = filter_var($postArray->image, FILTER_SANITIZE_STRING);
			$title = filter_var($postArray->title, FILTER_SANITIZE_STRING);
			$description = filter_var($postArray->description, FILTER_SANITIZE_STRING);
			$username = filter_var($postArray->username, FILTER_SANITIZE_STRING);
			$password = filter_var($postArray->password, FILTER_SANITIZE_STRING);

			if ($this->model('User')->login($username, $password)) {
				echo $this->model('Picture')->postPicture($image, $title, $description, $username);
			}
		}
	}
}

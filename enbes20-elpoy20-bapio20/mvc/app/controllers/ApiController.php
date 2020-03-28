<?php

class ApiController extends Controller {

	public function __construct () {
		header('Content-Type: application/json');
		//check api-key?
		//check username and password?
		//or die();
	}

	public function index ($param) {

	}
	//GET http://localhost:8080/enbes20-elpoy20-bapio20/mvc/public/api/users
	public function users () {
		$users = $this->model('User')->getAllApi();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

	public function pictures($user, $id)
	{
		//use Controller.php functions
		$id = filter_var($id, FILTER_SANITIZE_STRING);
		if ($this->get()) {
			$this->getPictures($id);
		}
		if ($this->post()) {
			$this->postPictures($id);
		}
	}

	//GET http://localhost:8080/enbes20-elpoy20-bapio20/mvc/public/api/pictures/users/{id}
	//POST http://localhost:8080/enbes20-elpoy20-bapio20/mvc/public/api/pictures/users/{id}

	private function getPictures($id){

		$pictures = $this->model('Feed')->getImageUserApi($id);
		echo json_encode($pictures, JSON_PRETTY_PRINT);

	}

	private function postPictures($id){

		$postPictures = json_decode($_POST['json']);
		$image = filter_var($postPictures->image, FILTER_SANITIZE_STRING);
		$header = filter_var($postPictures->header, FILTER_SANITIZE_STRING);
		$description = filter_var($postPictures->description, FILTER_SANITIZE_STRING);
		$username = filter_var($postPictures->username, FILTER_SANITIZE_STRING);
		$password = filter_var($postPictures->password, FILTER_SANITIZE_STRING);
		$date=date("Y-m-d H:i:s");

		$users = $this->model('User')->getUserByIdApi($id);

		if($username == $users['username'] && password_verify($password, $user['password'])){
			$uploadPicture = $image->model('Feed')->upload(array($image, $header, $description,$date ,$user_id));
			echo json_encode($uploadPicture);

		}
		else {
			echo 'error';
		}
	}

}

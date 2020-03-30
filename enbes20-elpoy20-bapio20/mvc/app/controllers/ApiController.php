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
	public function users() {
		$users = $this->model('User')->getAllApi();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

	public function pictures($user, $id)
	{
		//use Controller.php functions
		$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
		if ($this->get()) {
			$this->getPictures($id);
		}
		if ($this->post()) {
			$this->postPictures($id);
		}
	}

		//GET http://localhost:8080/enbes20-elpoy20-bapio20/mvc/public/api/pictures/user/{id}
		//POST http://localhost:8080/enbes20-elpoy20-bapio20/mvc/public/api/pictures/user/{id}
		public function getPictures($id){

			$pictures = $this->model('Feed')->getImageUserApi($id);
			echo json_encode($pictures, JSON_PRETTY_PRINT);

		}

		private function postPictures($id){
			//https://www.php.net/manual/fr/function.json-decode.php
			$postPictures = $_POST['json'];
			$json = json_decode($postPictures);
			if (json_last_error() === JSON_ERROR_NONE) {
			    echo "ITS JSON";
			} else {
			    echo "NO JSON";
			}
			$image = filter_var($json->image, FILTER_SANITIZE_STRING);
			$header = filter_var($json->header, FILTER_SANITIZE_STRING);
			$description = filter_var($json->description, FILTER_SANITIZE_STRING);
			$username = filter_var($json->username, FILTER_SANITIZE_STRING);
			$password = filter_var($json->password, FILTER_SANITIZE_STRING);
			$date=date("Y-m-d H:i:s");

			$user = $this->model('User')->getUserByIdApi($id);
			$post_object = array();


			if($username == $user['username'] && password_verify($password, $user['password'])){
				$uploadPicture = $image->model('Feed')->upload(array($image, $header, $description,$date ,$user_id));
				$post_object['image_id'] = $post_id;

				echo json_encode($post_object);


			}
			else {
				echo 'error';
			}
		}


}

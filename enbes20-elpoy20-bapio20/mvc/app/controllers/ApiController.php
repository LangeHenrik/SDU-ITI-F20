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
		public function getPictures($id){

			$pictures = $this->model('Feed')->getImageUserApi($id);
			echo json_encode($pictures, JSON_PRETTY_PRINT);

		}

		//POST http://localhost:8080/enbes20-elpoy20-bapio20/mvc/public/api/pictures/user/{id}
		public function postPictures($id){
			//https://www.php.net/manual/fr/function.json-decode.php
			//$postPictures = $_POST['json'];

			$json = json_decode($_POST['json'],true);
		  $image = filter_var($json['image'],FILTER_SANITIZE_STRING);
			//$image = filter_var($json->image, FILTER_SANITIZE_STRING);
			// $header = filter_var($json['header'], FILTER_SANITIZE_STRING);
			$header = $json['title'];

			$description = filter_var($json['description'], FILTER_SANITIZE_STRING);
			//$description = filter_var($json->description, FILTER_SANITIZE_STRING);
			$username = filter_var($json['username'], FILTER_SANITIZE_STRING);
			//$username = filter_var($json->username, FILTER_SANITIZE_STRING);
			$password = filter_var($json['password'], FILTER_SANITIZE_STRING);
			//$password = filter_var($json->password, FILTER_SANITIZE_STRING);
			$date=date("Y-m-d H:i:s");
			//print_r($json);

			//$user = $this->model('User')->getUserByIdApi($id);
			$userID = $this->model('User')->checkUserApi($username, $password);
			//$post_object = array();


			if($userID == $id){

				$uploadPicture = $this->model('Feed')->upload(array($image, $header, $description,$date ,$id));
				$uploadPicture = array('id'=>$uploadPicture);
				echo json_encode($uploadPicture,JSON_PRETTY_PRINT);

				//$post_object['image_id'] = $post_id;

			 	//echo json_encode($post_object);


			}
			else {
				echo 'error credentials';
			}
		}


}

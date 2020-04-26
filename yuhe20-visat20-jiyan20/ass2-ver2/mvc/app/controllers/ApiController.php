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
	
	public function users () {
		$users = $this->model('User')->getAll();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

	public function pictures($user, $id) {

		$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
		$user = filter_var($user, FILTER_SANITIZE_STRING);

		if ($this->get()){
			$this->getPictures($user);
		}
		elseif ($this->post()){
			$this->postPictures($user);
		}
	}

	public function getPictures($user) {
		echo json_encode($this->model('Feed')->getUserImages($user), JSON_PRETTY_PRINT);
	}

	public function postPictures($username) {
		$json = json_decode($_POST['json'],true);
		$image = filter_var($json['image'],FILTER_SANITIZE_STRING);
		$header = $json['title'];

		$description = filter_var($json['description'], FILTER_SANITIZE_STRING);
		$username = filter_var($json['username'], FILTER_SANITIZE_STRING);

		if($user == $username){
			$uploadPicture = $this->model('Image')->upload($header, $description, $username);
			$uploadPicture = array('id'=>$uploadPicture);
			echo json_encode($uploadPicture,JSON_PRETTY_PRINT);
		}
		else {
			echo 'error credentials';
		}
	}

	}

	// public function images ($user_id, $username) {
	// 	$user_id = filter_var($user_id, FILTER_SANITIZE_STRING);
    //     if ($user_id != "user_id") {
	// 		return null;
	// 	}
	// 	if ($this->post()) {
	// 		$UP_info = json_decode($_POST['json'], true);
	// 		print_r($UP_info);
	// 		$UP_info['username'] = $username;
	// 		if($this->model('user')->verifyUser($UP_info)) {
	// 			$user_image = $this->model('Image')->ApiImage($UP_info);
	// 		} elseif ($this->getAll()) {
	// 			 $result = $this->model('Image')->getUserImages($user_id);
	// 			 echo json_encode($result,JSON_PRETTY_PRINT);
	// 		}

	// 	}

	// }

}
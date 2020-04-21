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

	public function images ($user, $user_id) {
		if ($this->post()) {
			$UP_info = json_decode($_POST['json'], true);
			print_r($UP_info);
			$UP_info['userid'] = $user_id;
			if($this->model('user')->verifyUser($UP_info)) {
				$user_image = $this->model('image')->ApiUploadImage($UP_info);
			} elseif ($this->get()) {
				 $result = $this->model('image')->getUserImages($user_id);
				 echo json_encode($result,JSON_PRETTY_PRINT);
		}

	}

}
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

	public function pictures($id) {
		$images = $this->model('Image')->getImagesByUser($id);
		for ($i = 0; $i < count($images); $i++) {
			$path = './' . $images[$i]['image'];
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$data = file_get_contents($path);
			$base64 = base64_encode($data);
			$images[$i]['image'] = $base64;
		}
		echo json_encode($images, JSON_PRETTY_PRINT);
	}

}
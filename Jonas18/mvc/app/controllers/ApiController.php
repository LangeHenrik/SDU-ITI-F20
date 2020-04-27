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
	
	public function users () 
	{
		$users = $this->model('User')->getAll();
		if ($this->get()) {

			$usersArray = array();

			foreach ($users as $user) {
				$jsonAttributeName['user_id'] = $user['user_id'];
				$jsonAttributeName['username'] = $user['username'];
				$usersArray[] = $jsonAttributeName;
			}
		echo json_encode($usersArray, JSON_PRETTY_PRINT);
		} 
	}


	public function pictures($param1, $userid){
			if (strcasecmp($param1, 'user') == 0) {
			if ($this->get()) {
					$this->getPictures($userid);
			}
			if ($this->post()) {
				$json = $_POST['json'];
					$this->model('Image')->insertImageByUserID ($userid, $json);
					$image_id = $this->model('Image')->getLatestImageID($userid);
					echo json_encode($image_id, JSON_PRETTY_PRINT);
			}}
	}
/* GET localhost:8080/xx/mvc/public/api/pictures/user/2 */
	public function getPictures($userid){
		$images = $this->model('Image')->getPictures($userid);
		foreach ($images as $image) {
			$jsonAttributeName['image_id'] = $image['image_id'];
			$jsonAttributeName['title'] = $image['title'];
			$jsonAttributeName['description'] = $image['description'];
			$jsonAttributeName['image'] = $image['image'];
			$imageArray[] = $jsonAttributeName;
		}

		echo json_encode($imageArray, JSON_PRETTY_PRINT);
	}

}
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

	public function user_images($param) {
		$images = $this->model('User')->getAllImages($param);
		echo json_encode($images, JSON_PRETTY_PRINT);
	}

	public function upload($param) {
		strtolower($param);
		if ($param === "image") {
			$image_id = $this->model('Image')->api_uploadImage();
			if ($image_id === 0) {
				echo "upload failed";
			}
			else {
				// echo "upload success";
				echo json_encode($image_id, JSON_PRETTY_PRINT);
			}
		}
		// $json = $_POST['json'];
		// $obj = json_decode($json, TRUE);

		// foreach($obj as $key => $value) 
		// {
		// 	echo 'Your key is: '.$key.' and the value of the key is:'.$value;
		// }
	}

	public function pictures($directive, $user_id) {
		if (strtolower($directive) === "user") {
			if ($this->post()) {
				$image_id = $this->model('Image')->api_uploadImage($user_id);
				if ($image_id == 0) {
					echo "upload failed";
				}
				else {
					echo '{"image_id": "' . $image_id . '"}';
				}
			}
			elseif ($this->get()) {
				$images = $this->model('Image')->getAllImagesFromUser($user_id);
				
				$json = json_encode($images, JSON_PRETTY_PRINT);
				echo $json;
			}
			else {
				echo "not a post or get request";
			}
		}
		else {
			echo "parameters are wrong";
		}
	}

}
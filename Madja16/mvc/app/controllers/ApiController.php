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
				echo "upload success";
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
				if ($image_id === 0) {
					echo "upload failed";
				}
				else {
					// echo "upload success";
					echo '{"image_id": "' . $image_id . '"}';
				}
				// echo "post pictures " . $user_id;
			}
			elseif ($this->get()) {
				$images = $this->model('Image')->getAllImagesFromUser($user_id);

				// $json = '{ "pictures": [ ';

				// for ($i=0; $i < count($images); $i++) { 
					
				// 	// made JSON by hand to comply with the required JSON format
				// 	$json .= ' "' . $images[$i]['image_id'] . '": [{"image": "' . $images[$i]['image_blob']. '"
				// 			, "title": "' . $images[$i]['image_header']. '"
				// 			, "description": "' . $images[$i]['image_description']. '"
				// 			, "image_id": "' . $images[$i]['image_id'] . '"}]';
					
				// 	if ($i < count($images) - 1) {
				// 		$json .= ',';
				// 	}

				// 	// echo '{"image": "' . $images[$i]['image_blob'] 
				// 	// 	. '", "title": "' . $images[$i]['image_header'] 
				// 	// 	. '", "description": "' . $images[$i]['image_description'] 
				// 	// 	. '", "image_id": "' . $images[$i]['image_id'] . '"}';

				// }

				// $json = $json . '] }';
				
				$json = "";

				print_r($images);

				echo $json;

				// made JSON by hand to comply with the required JSON format
				// echo '{"image": "' . $images[0]['image_blob'] . '" ,"title": "' . $images[0]['image_header'] . '" ,"description": ' . $images[0]['image_description'] .'}';

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
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
		$users = $this->model('User')->list_users();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

	public function pictures($pewPEWpew,$user_id){
		$imageModel = $this->model('Image');
		if ($this->post() &&  isset($_POST['json'])) {
			$userModel = $this->model('User');
			$data = json_decode($_POST['json'],true)[0];
//			echo json_encode($data);
//			echo json_encode(array(
//			 	'image'=>isset($data['image']),
//				'title'=>isset($data['title']),
//				'description'=>isset($data['description']),
//				'username'=>isset($data['username'])));

			if ( !( isset($data['image']) &&
				isset($data['title']) &&
				isset($data['description']) && 
				isset($data['username']) && 
				isset($data['password'])) ) {
				die();
			}
//			echo json_encode(array('Test' => 'Yes'));
			$_POST['username'] = $data['username'];
			$_POST['password'] = $data['password'];

			error_log(">> username = " . $_POST['username']);
			error_log(">> password = " . $_POST['password']);

			if ($userModel->login() && ($userModel->getInfo()['user_id'] == $user_id) ) {
				error_log("[] calling uploadBlob");
				$blobResult = $imageModel->uploadBlob($data);
				error_log("[] uploadBlob returned " . ($blobResult?"True":"False"));

			}
		} elseif($this->get()) {
			$images = $imageModel->list_images($user_id);
			$result = array();
			foreach ($images as $image) {
				$tmp['image'] = base64_encode(file_get_contents("../" . $image['image_path']));
				$tmp['title'] = $image['header'];
				$tmp['description'] = $image['description']; 
				$result[] = $tmp;
			}
			echo json_encode($result);
		}
	}


}

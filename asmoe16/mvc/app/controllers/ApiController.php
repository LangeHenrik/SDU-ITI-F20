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
		echo json_encode($users);
	}

	private function postPicture($user_id) {
		$userModel = $this->model('User');
		$imageModel = $this->model('Image');
		$data = json_decode($_POST['json'],true);

		if ( !( isset($data['image']) &&
			isset($data['title']) &&
			isset($data['description']) && 
			isset($data['username']) && 
			isset($data['password'])) ) {
			die();
		}

		$_POST['username'] = $data['username'];
		$_POST['password'] = $data['password'];

		if ($userModel->login() && ($userModel->getInfo()['user_id'] == $user_id) ) {
			error_log("[] calling uploadBlob");
			$blobResult = $imageModel->uploadBlob($data);
			error_log("[] uploadBlob returned " . ($blobResult?"True":"False"));
		}
	}

	private function getPicture($user_id) {
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

	private function ajax($user) {
		$imageModel = $this->model('Image');
		$userModel = $this->model('User');
		$images = $imageModel->list_images( $userModel->getId($user) );
		$viewbag['images'] = $images;
		$this->view('image/ajax',$viewbag);
	}

	public function pictures($selector,$user_id){
		switch ($selector) {
			case 'user':
				if ($this->post() &&  isset($_POST['json'])) {
					$this->postPicture($user_id);
				} elseif($this->get()) {
					$this->getPicture($user_id);
				}
				break;
			case 'ajax':
				if ($this->get()) {
					$this->ajax($user_id);
				}
				break;
			
			default:
				error_log("picture api: " . $selector . " is not an option");
				break;
		}
	}
}

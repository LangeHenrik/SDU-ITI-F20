<?php

class ImageController extends Controller {
	
	public function index (string $username="") {
		$imageModel = $this->model('Image');
		$images = array();
		$userModel = $this->model('User');
		if ( isset( $_GET['user-selector'] ) && ($_GET['user-selector'] !== 'All') ) {
			$username = $_GET['user-selector'];
		} 
		if ( $username !== "" ) {
			$images = $imageModel->list_images( $userModel->getId($username) );
		} else {
			$images = $imageModel->list_images();
		}
		$viewbag['users'] = $userModel->list_users();
		$viewbag['images'] = $images;
		$this->view('image/index',$viewbag);
	}

	public function uploadpage() {
		$this->view('image/uploadpage');
	}

	public function upload() {
		if ($this->post()) {
			$ImageModel = $this->model('Image');
			if ( $ImageModel->upload() ) {
				// Upload is succes
				header('Location: /asmoe16/mvc/public/image/index');
			} else {
				// Something went wrong tell the user what
				$viewbag['error'] = $ImageModel->getError();
				$this->view('image/uploadpage',$viewbag);
			}
		} else {
			header('Location: /asmoe16/mvc/public/image/uploadpage');
		}
	}

}

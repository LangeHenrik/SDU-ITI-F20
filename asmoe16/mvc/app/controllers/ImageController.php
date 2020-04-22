<?php

class ImageController extends Controller {
	
	public function index (string $username="") {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		$imageModel = $this->model('Image');
		$images = array();
		if ($username !== "") {
			$userModel = $this->model('User');
			$images = $imageModel->list_images( $userModel->getId($username) );
		} else {
			$images = $imageModel->list_images();
		}

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
			}
		} else {
			$this->uploadpage();
		}
	}

}

<?php

class ImageController extends Controller {
	
	public function index ($param) {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		echo '<br><br>Image Controller Index Method<br>';
		echo 'Param: ' . $param . '<br><br>';
	}
	
	
	public function restricted () {
		echo 'Welcome - you must be logged in';
	}

    // should use view from image folder
	public function upload() {
		if ($this->post()) {
			if ($this->model('Image')->uploadImage()) {
				$this->view('image/imagefeed');
			}
			else {
				$this->view('home/index');
			}
		}
		else { // non POST request
			$this->view('image/upload');
		}
	}

	public function imagefeed() {
		$viewbag = $this->model('Image')->getImageFeed();
		$this->view('image/imagefeed', $viewbag);
	}
}
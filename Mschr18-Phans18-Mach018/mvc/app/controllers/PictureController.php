<?php

class PictureController extends Controller {

	public function index () {
		if ($this->isPost() || $this->isGet()) {
			echo "fail";
		}
		else {
			header('Location: ' . BASE_URL . 'home/index');
		}
	}

	// ********** Methods for when user is logged in **********
	// Feed page is added in restrictions
	public function feed() {
		$picture = $this->model('Picture');
		$viewbag = $picture->getPictures();
		$this->view('picture/feed', $viewbag);
	}
	// Uploading og pictures
	public function uploadPicture() {
		if ($this->isPost()) {
			$this->model('Picture')->uploadPicture();
		}
		header('Location: ' . BASE_URL . 'home/index');
	}
	// Delete picture
	public function deletePicture() {
		if ($this->isPost()) {
			$this->model('Picture')->deletePicture();
		}
		header('Location: ' . BASE_URL . 'home/index');
	}
}

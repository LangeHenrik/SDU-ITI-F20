<?php

class ImageController extends Controller {
	
	public function index ($param) {
		
	}

    public function feed() {
        $images = $this->model('Image')->getImages();
        $_SESSION['actual_page'] = 'imagefeed';
        $this->view('images/feed', $images);
    }

    public function upload() {
        $_SESSION['actual_page'] = 'upload';
        $this->view('images/upload');
    }

    public function upload_image() {
        if ($this->post()) {
            $this->model('Image')->uploadImage();
            $_SESSION['actual_page'] = 'upload';
            header('Location:../image/upload');
        }
    }
}
?>
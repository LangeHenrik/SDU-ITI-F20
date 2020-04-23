<?php

class ImageController extends Controller {
	
	public function index ($param) {
		
	}

    public function feed() {
        $images = $this->model('Image')->getImages();
        $_SESSION['actual_page'] = 'imagefeed';
        $this->view('images/feed', $images);
    }

}
?>
<?php

class ImageController extends Controller {
	

	public function index ($param) {
		
	}

	public function ViewImages () {
		$this->model('Imagemode')->postImages();
        //echo json_encode($users, JSON_PRETTY_PRINT);
    }
}
<?php

class ImageController extends Controller {
	

	public function index ($param) {
		
	}

	public function postImages() {	
		$this->model('Imagemode')->postImages();
		//$this->view('qannu18/mvc7public/home/UploadImage');
        //echo json_encode($users, JSON_PRETTY_PRINT);
	}
	



	public function getImages() {
	//$viewbag =  $this->model('Imagemode')->getImages();
	//$this->view('qannu18/mvc7public/home/ViewImage', $viewbag);
		    $this->model('Image')->getImages();
		//$this->view('qannu18/mvc7public/home/ViewImage');


	}


	public function getImagefromuser($username){

        $this->model('Image')->getImagefromuser($username);
       
	}
}
?>
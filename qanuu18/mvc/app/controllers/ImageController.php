<?php

class ImageController extends Controller {
	

	public function index ($param) {
		
	}

	public function postImages($param) {	
		if($this->post()){

			$this->model('Image')->postImages();

		}	 
		
        else {

           $this->view('home/UploadImage');

		}
		//$this->view('qannu18/mvc7public/home/UploadImage');
        //echo json_encode($users, JSON_PRETTY_PRINT);
	}
	




	public function getImages() {
	//$viewbag =  $this->model('Imagemode')->getImages();
	//$this->view('qannu18/mvc7public/home/ViewImage', $viewbag);
		    //$this->model('Image')->getImages();
		//$this->view('qannu18/mvc7public/home/ViewImage');
		$image   =   $this->model('Image')->getImages();
		$this->view('home/ViewImage', $image);

	}


	public function getImagefromuser(){

        $image   =   $this->model('Image')->getImagefromuser();
		$this->view('home/ViewImage', $image);
	}
}
?>
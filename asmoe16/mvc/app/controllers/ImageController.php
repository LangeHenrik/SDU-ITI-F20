<?php

class ImageController extends Controller {
	
	public function index () {
		//This is a proof of concept - we do NOT want HTML in the controllers!
		$this->view('home/index');
	}

	public function uploadpage()
	{
		$this->view('image/uploadpage');
	}
	

}

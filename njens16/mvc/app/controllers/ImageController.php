<?php

class ImageController extends Controller {
	
    public function index () 
    {
        header('Location: /njens16/mvc/public/home/frontpage');
	}

    public function images()
    {
        $viewbag['page'] = "images";
        
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
        $this->view("image/images", $viewbag);
    }

    public function upload()
    {

    }



}

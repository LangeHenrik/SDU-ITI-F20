<?php

class ImageController extends Controller {
	
    public function index () 
    {
        $viewbag["page"] = "images";
        
		$viewbag["images"] = $this->model("Image")->getAllImages();
        $this->view("image/images", $viewbag);
    }

    public function upload()
    {
        if($this->post())
        {
             $viewbag["page"] = "images";
             $viewbag["imageUploadMSG"] = $this->model("Image")->upload();
		     $viewbag["images"] = $this->model("Image")->getAllImages();
             $this->view("image/images", $viewbag);
        }
        else
        {
		    header("Location: /njens16/mvc/public/image/index");
        }
        
    }



}

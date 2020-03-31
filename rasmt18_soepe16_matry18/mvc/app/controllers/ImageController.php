<?php

class ImageController extends Controller {
    public function index () {
        //This is a proof of concept - we do NOT want HTML in the controllers!
//		echo '<br><br>Home Controller Index Method<br>';
//		echo 'Param: ' . $param . '<br><br>';
        $this->view('image/index');
    }

    public function upload(){

        $this->view('image/upload');
    }
}

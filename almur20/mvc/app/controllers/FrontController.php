<?php

class FrontController extends Controller {

	public function index ($param) {
        $this->view('front/index');
	}

}
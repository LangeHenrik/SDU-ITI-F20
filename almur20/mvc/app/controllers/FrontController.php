<?php

class FrontController extends Controller {

	public function index ($param) {
		$_SESSION['actual_page'] = 'frontpage';
        $this->view('front/index');
	}

}
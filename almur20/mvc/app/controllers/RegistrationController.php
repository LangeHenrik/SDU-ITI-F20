<?php

class RegistrationController extends Controller {

	public function index ($param) {
		$_SESSION['actual_page'] = 'registration';
        $this->view('registration/index');
	}

}
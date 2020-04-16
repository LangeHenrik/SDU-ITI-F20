<?php

class HomeController extends Controller {

	// Main / home / default - page.
	public function index ($param) {
		if (isset($param) && $param == 401) {
			if (preg_match('/^\/home\/401$/', $_SERVER['PATH_INFO'])) {
				$this->view('home/401');
			}
			else {
				header('Location: ' . BASE_URL . 'home/401');
			}
		}
		elseif (!preg_match('/^\/home\/index$/', $_SERVER['PATH_INFO'])) {
			header('Location: ' . BASE_URL . 'home/index');
		}
		else {

			if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
				$picture = $this->model('Picture');
				$viewbag = $picture->getPictures($_SESSION['username']);
				$this->view('home/index', $viewbag);
			}
			else {
				$this->view('home/index');
			}
		}
	}

}

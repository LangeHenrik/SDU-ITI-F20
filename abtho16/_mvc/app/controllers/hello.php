<?php

class Hello extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
	
		
		$this->view->render('hello/index');
		
    }
}
<?php

//Test class 

class Contact extends Controller
{
  public function index()
  {
    $this->view('home/login');
  }

  public function phone()
  {
  	$this->view('user/register');
  }
  
}
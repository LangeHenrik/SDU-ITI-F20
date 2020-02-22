<?php

class UserController extends Users {

    public function createUser($email,$password,$name){
        $this->setUser($email, $password, $name);
    }

}
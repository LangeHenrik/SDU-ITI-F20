<?php

class UserController extends Users {

    public function createUser($email,$password,$name){
        $this->setUser($email, $password, $name);
    }

    public function userExists($username){
        if(sizeof($this->getUserFromUsername($username)) <= 0){
            return false;
        } elseif (sizeof($this->getUserFromUsername($username)) == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function validateUser($username, $password){
        $users = $this->getUserFromUsername($username);
        foreach ($users as $user){
            if($user['username'] == $username && $user['password'] == $password){
                return true;
            } else {
                echo 'Username or password was wrong';
                return false;
            }
        }

    }

    public function createPost($username, $image, $comment){
        $this->savePost($username, $image, $comment);
    }

}
<?php

class UserController extends Users {

    public function createUser($email,$password,$name){
        $this->setUser($email, $password, $name);
    }

    public function userExists($username){
        if(sizeof($this->getUserFromUsername($username)) <= 0){
            return false;
        } else {
            return true;
        }
    }

    public function getAllUsers(){
        return $this->getUsers();
    }
    
    public function validateUser($username, $password){
        $users = $this->getUserFromUsername($username);
        foreach ($users as $user){
            $hash = $user['password'];
            if($user['username'] == $username && password_verify($password,$hash)){
                return true;
            } else {
                echo 'Username or password was wrong';
                return false;
            }
        }

    }

    public function getAllPosts()
    {
        return $this->getPosts();
    }

    public function createPost($username, $title, $image, $comment){
        $this->savePost($username, $title, $image, $comment);
    }

}
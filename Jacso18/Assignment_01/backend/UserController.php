<?php

class UserController extends Users {

    public function createUser($email,$password,$name){
        $this->setUser($email, $password, $name);
    }

    public function userExists($email){
        if(sizeof($this->getUserFromMail($email)) <= 0){
            return false;
        } elseif (sizeof($this->getUserFromMail($email)) == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function validateUser($email, $password){
        $users = $this->getUserFromMail($email);
        foreach ($users as $user){
            if($user['email'] == $email && $user['password'] == $password){
                return true;
            } else {
                echo 'Email or password was wrong';
                return false;
            }
        }

    }

}
<?php

class UserView extends Users {
    
    public function getAllPosts()
    {
        return $this->getPosts();
    }


}

?>
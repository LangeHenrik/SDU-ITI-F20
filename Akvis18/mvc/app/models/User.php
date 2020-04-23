<?php
class User extends Database {
	
	public function login($username, $pass){
        $result = $this->query("SELECT user_id, username, password FROM user WHERE username = ?", [$username]);

        if (password_verify($pass, $result[0]['password'])) {
            return true;
        }
        return false;
	}

	public function newUser($username, $email, $password, $avatar){
	    if ($avatar != null){
	        $avatar = base64_encode($avatar);
        }
        $this->query('INSERT INTO user (username, email, password, avatar) VALUES (?, ?, ?, ?);', [$username, $email, $password, $avatar]);
    }

	public function getAll() {
        return $this->query("SELECT user_id, username, avatar, created_on FROM user");
	}

    public function getUserID($username){
	    return $this->query('SELECT user_id FROM user WHERE username = ?', [$username])[0]['user_id'];

    }

    public function userAvailable($username, $email){
       return $this->query("SELECT COUNT(*) FROM user WHERE username = ? or email = ?;", [$username, $email])[0]['COUNT(*)'] == 0;
    }

    public function getAvatar($username){
	    $avatar = $this->query('SELECT avatar FROM user WHERE username = ? ', [$username]);
	    $avatar['avatar'] = base64_decode($avatar[0]['avatar']);
	    return $avatar[0]['avatar'];
    }
}
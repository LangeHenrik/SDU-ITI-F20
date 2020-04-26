<?php
class User extends Database {
	
	public function login($username, $password){
		$sql = $this->query("SELECT username, password FROM users WHERE username = :username");

		if (password_verify($password, $sql[0]['password'])) {
		    return true;
        }
		return false;

		/*
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetch(); //fetchAll to get multiple rows

		print_r($result);


		//todo: make an actual login function!!
		return true;*/
	}

	public function newUser($username, $password) {
	    if ($username != null && $password != null) {
	        $this->query('INSERT INTO users (username, password) VALUES (?, ?);', [$username, $password]);
        }
    }

    public function userAvailable($username) {
	    return $this->query("SELECT COUNT(*) FROM users WHERE username = '$username'")[0]['COUNT(*)'] == 0;
    }

    public function getUserId($username){
	    return $this->query('SELECT user_id FROM users WHERE username = ?', [$username])[0]['user_id'];
    }

	public function getAll () {

		$sql = "SELECT username FROM users";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

}
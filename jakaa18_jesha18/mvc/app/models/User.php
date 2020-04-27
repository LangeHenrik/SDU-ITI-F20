<?php
class User extends Database {
	
	public function login($username, $password){
        $sql = "SELECT username, password FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch();
        return ($username == $result['username'] && password_verify($password, $result['password']));
	}

	public function newUser($username, $password) {
	    if ($username != null && $password != null) {
            try {
                $stmt = $this->conn->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
                if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
                    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
                    $stmt->execute([$username, $hashed_pass]);
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $exception) {
                $duplicate = "Integrity constraint violation: 1062 Duplicate entry";
                if (strpos($exception->getMessage(), $duplicate) !== FALSE) {
                    return false;
                } else {
                    throw $exception;
                }
            }
        }
    }

    public function userAvailable($username) {
	    return $this->query("SELECT COUNT(*) FROM users WHERE username = '$username'")[0]['COUNT(*)'] == 0;
    }

    public function getUserId($username, $password){
	    $stmt = $this->query('SELECT user_id FROM users WHERE username = ?', [$username])[0]['user_id'];
	    //$user_id = $stmt['user_id'];
	    if ($this->login($username, $password) == true) {
	        return $stmt;
        }
    }

	public function getAll () {

		$sql = "SELECT user_id, username FROM users";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

}
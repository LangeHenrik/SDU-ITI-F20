<?php
class User extends Database {
	
	public function login($username, $password){
		$username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
		$sql = "SELECT username, pwd, userid FROM users WHERE username = :username";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetch(); //fetchAll to get multiple rows

		print_r($result);


		//todo: make an actual login function!!
		if ($result['username'] == $username && password_verify($password, $result['pwd'])) {
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['userid'];
            return true;
        }
        return false;
	}

	public function getAll () {

		$sql = "SELECT username, userid FROM users";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

	public function register ($username, $email $pwd, $pwd_repeat) {
		if ($pwd != $pwd_repeat) {
			return false;
		}

		$username = filter_var($username, FILTER_SANITIZE_STRING);
        $pwd = filter_var($pwd, FILTER_SANITIZE_STRING);
		$pwd_repeat = filter_var($pwd_repeat, FILTER_SANITIZE_STRING);
		$email = filter_var($emailR, FILTER_SANITIZE_STRING);
        try {
            $sql = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username);
			$stmt->bindParam(':pwd', $pwd);
			$stmt->bindParam(':email', $email);
            if($stmt->execute()){
                
                return array('succes' => "Registered successfully!");
            }
		} catch (PDOException $e) {
			if ($e->errorInfo[1] == 1062) {
				return array('danger' => "Username already exists");
			} else {
				return array('danger' => "Error occured please check all credentials have been filled out correctly");
			}
		}
	

	}

	public function verifyUser($UP_info) {
        $username = filter_var($UP_info['username'], FILTER_SANITIZE_STRING);
        $password = filter_var($UP_info['password'], FILTER_SANITIZE_STRING);
        $userid = filter_var($UP_info['userid'], FILTER_SANITIZE_NUMBER_INT);

        $sql = "SELECT username, pwd, userid FROM users WHERE username = :username 
                && userid = :userid";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':userid', $userid);

        $stmt->execute();

        $result = $stmt->fetch();

        if(password_verify($pwd, $result['pwd'])) {
            return true;
        } else {
			return false;
		}

    }
}
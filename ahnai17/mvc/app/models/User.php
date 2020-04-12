<?php
class User extends Database {
	
	public function login($username){
		$sql = "SELECT username, password FROM users WHERE username = :username";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		$result = $stmt->fetch(); //fetchAll to get multiple rows
		print_r($result);
                if($result!=null){
		//todo: make an actual login function!!
		return true;
                } else {
                    return false;
                }
	}
        public function register(){
            $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
            $sql="INSERT INTO users(username, password) VALUES(:username,:password)";
            $hashed_password= password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password',$hashed_password);
            $stmt->execute();
        }
	public function getAll () {

		$sql = "SELECT id, username FROM users";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

}
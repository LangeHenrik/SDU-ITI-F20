<?php
class User extends Database {
	
	public function login($username_input, $password_input){

        $sql ="SELECT username,password FROM user WHERE username=:username;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username',$username_input,PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $row) {
            if($row['username'] == $username_input && password_verify($password_input,$row['password'])){
              return true;
            }
        }

		return false;
	}

    public function signup($username,$hashed_password){
        $stmt = $this->conn->prepare("INSERT INTO user (username,password) values(:username,:password);");
        //$stmt->execute();
        $stmt->bindParam(':username',$username, PDO::PARAM_STR);
        $stmt->bindParam(':password',$hashed_password, PDO::PARAM_STR);
        $stmt->execute();
	    return true;
    }



	public function getAll () {
		$sql = "SELECT user_id,username FROM user";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}



}
<?php
class User extends Database {
	
    public function login ()
    {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_SPECIAL_CHARS);
        $password = $_POST["password"];
		$sql = "SELECT username, password FROM user WHERE username = :username";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetch(); 

        if ($result === false)
        {
            return false;
        } 
        if (password_verify($password, $result["password"]))
        {
            return true;
        }

		return false;
	}

	public function getAll () {

		$sql = "SELECT username FROM user";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

        $result = $stmt->fetchAll();
		return $result;
	}

}

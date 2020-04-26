<?php
class User extends Database {
	
    public function login ()
    {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_SPECIAL_CHARS);
        $password = $_POST["password"];
		$sql = "SELECT user_id, username, password FROM user WHERE username = :username";
		
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
			$_SESSION["logged_in"] = true;
            $_SESSION["user_id"] = $result["user_id"];
            return true;
        }

		return false;
	}

	public function getAll () {

		$sql = "SELECT user_id, username FROM user";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

        $result = $stmt->fetchAll();
		return $result;
    }

    public function registerUser()
    {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = $_POST["password"];
        $password = password_hash($password, PASSWORD_BCRYPT);


        $sql = "SELECT * FROM user WHERE username = :username";

		$stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);        
        if($user === false)
            {
                $sql = "INSERT INTO user(username, password) VALUES(:username, :password)";
		        $stmt = $this->conn->prepare($sql);
                $stmt->bindValue(":password", $password);
                $stmt->bindValue(":username", $username);
                $stmt->execute();
                return true;
            }
        return false;
    }
    public function APIverifyUser($userID)
    {
        $jsonVar = json_decode($_POST["json"], true);
        if (!(isset($jsonVar["username"]) && isset($jsonVar["password"])))
        {
            echo "error in login";
            die();
        }
        $username = filter_var($jsonVar["username"], FILTER_SANITIZE_SPECIAL_CHARS);
        $password = $jsonVar["password"];
        $sql = "SELECT user_id, username, password FROM user WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetch(); 

        if ($result === false)
        {
            return false;
        } 
        if ($userID != $result["user_id"])
        {
            return false;
        }
        if (password_verify($password, $result["password"]))
        {
            return true;
        }
        return false;
 
    }
}

<?php
class User extends Database {

	public function login($username,$password){

        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);

        $sql = 'CALL Login(:username,@returnParam)';

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR, 45);

        $stmt->execute();

        $stmt->closeCursor();

        $row = $this->conn->query("SELECT @returnParam AS return_value")->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            if ($row !== false) {
                if($row["return_value"] === 'User does not exist'){
                    return "User does not exist";
                }
                else if(!password_verify($password,$row["return_value"])){
                    return "Invalid password";
                }
                else{
                    return true;
                }
            }
        }
	}

	public function logout(){
	    //todo
    }

    public function register($username,$password){

	    $username = htmlspecialchars($username);
	    $password = htmlspecialchars($password);


        $sql = 'CALL UserExists(:username,@bool)';

        // prepare for execution of the stored procedure
        $stmt = $this->conn->prepare($sql);

        // pass value to the command
        $stmt->bindParam(':username', $username, PDO::PARAM_STR, 45);

        // execute the stored procedure
        $stmt->execute();

        $stmt->closeCursor();

        $row = $this->conn->query("SELECT @bool AS return_message")->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            if ($row !== false) {
                //User exists
                if ($row["return_message"]) {
                    return "A user with such username exists. Select a new username or login.";
                } else //Insert user
                {
                    $sql = 'CALL InsertNewUser(:username,:password)';

                    // prepare for execution of the stored procedure
                    $stmt = $this->conn->prepare($sql);

                    $pwdHashed = password_hash($password, PASSWORD_DEFAULT);


                    // pass value to the command
                    $stmt->bindParam(':username', $username, PDO::PARAM_STR, 45);
                    $stmt->bindParam(':password', $pwdHashed, PDO::PARAM_STR, 45);

                    // execute the stored procedure
                    $stmt->execute();

                    $stmt->closeCursor();
                    return true;
                }
            }
        }
    }

	public function getAll () {

        $sql = 'CALL GetUsers()';

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		$users = [];

        if ($result) {
            foreach ($result as $user) {
                $userInfo["user_id"] = $user['user_id'];
                $userInfo["username"] = $user['username'];
                array_push($users,$userInfo);
            }
        }

		return $users;
	}

	public function validateUser($username,$password){
	    return self::login($username,$password);
    }

    public function userID($username){
	    $username = htmlspecialchars($username);

        $sql = 'CALL GetUserID(:username)';

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR, 45);

        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result[0]['user_id'];
    }

    public function username($userID){

        $userID = htmlspecialchars($userID);

        $sql = 'CALL GetUsername(:userID)';

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result[0]['username'];
    }
}
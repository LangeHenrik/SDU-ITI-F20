<?php
class User extends Database
{
    public function register()
    {
		$register_attempt = false;

        $username = strip_tags($_REQUEST['username']);
        $password = strip_tags($_REQUEST['password']);

        //Hash the password as we do NOT want to store our passwords in plain text.
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

		//Prepare a sql SELECT statement to check whether username already exists in the database.
		$sql = "SELECT username FROM users WHERE username=:username";
		$stmt = $this->conn->prepare($sql);
	
		$stmt->bindValue(':username', $username);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
		//Now, we check if the supplied username already exists.
        if ($row["username"] === $username) {
			return $register_attempt;
        }

        //Prepare a sql INSERT statement, to add a new user to the database.
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $this->conn->prepare($sql);

        //Bind our variables.
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $hashed_password);

        //Execute the statement and insert the new user account.
		$result = $stmt->execute();
		
		if ($result) {
			$register_attempt = true;
			return $register_attempt;
		} else {
			//If there was a problem with the INSERT query, alert the user and redirect back to registration page.
			return $register_attempt;
	}
}

    public function login()
    {
		$username = strip_tags($_REQUEST['username']);
		$password = strip_tags($_REQUEST['password']);
		
        $sql = "SELECT username, password FROM user WHERE username = :username";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
	
		$result = $stmt->fetch(PDO::FETCH_ASSOC); //fetchAll to get multiple rows

		//Check if row count is above 0, by doing so, we know whether a user with that username exists.
		if ($stmt->rowCount() > 0) {

			//Check if password is correct by unhashing and verifying it.
			if(password_verify($password, $row['password'])){
	
				//Successfully log user in and provide information to session.
				$_SESSION["logged_in"] = true;
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['username'] = $username;
	
				$message[] = 'Successful login!';
				
			} else {
				$message[] = 'Incorrect username/password combination!';
			}
		} else {
			$message[] = 'No such username in the system!';
		}

		return $message;
    }

    public function getAll()
    {
        $sql = "SELECT username FROM user";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }
}

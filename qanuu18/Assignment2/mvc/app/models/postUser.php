<?php
class User extends Database {
	
	public function login($username){
		$sql = "SELECT username, password FROM users WHERE username = :username";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetch(); //fetchAll to get multiple rows

		print_r($result);


		//todo: make an actual login function!!
		return true;
	}

	public function postUser () {
        
    if(isset($_POST['submitbtn'])) {

        $usernameinput = filter_input(INPUT_POST,"usernameInput", FILTER_SANITIZE_STRING);
        $passwordinput = filter_input(INPUT_POST,"passwordInput",FILTER_SANITIZE_STRING);
        $hashedpassword = password_hash($passwordinput,PASSWORD_DEFAULT);
        

        //if($passwordInput == $passwordInput2) {

            //Denne her kryptere koden og username
            // $passwordInput = md5($passwordInput);
            // $usernameInput = md5($usernameInput);


            $sql = "INSERT INTO userinfo(user, password) VALUES (:username, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array(
                "username" => $usernameinput, 
                "password" => $hashedpassword
            )); 
            $query->setFetchMode(PDO::FETCH_ASSOC);
            echo "<div class='form'>
            <h3>You are registered successfully.</h3>
            <br/>Click here to <a href='index.php'>Login</a></div>";
        } else {
            echo "Try again";
        }
    }

		
	}


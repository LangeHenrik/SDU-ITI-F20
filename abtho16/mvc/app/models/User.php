<?php

class User extends Database {


    public function getUsers() {
        $users = array();
        $st = $this->conn->prepare("SELECT userid,username,firstname,lastname,zipcode,city,email,phonenumber FROM user;");
        $results = array();
        if ($st->execute()) {
            while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row;
            }
        }
        $users = [];
        foreach($results as $result) {
            array_push($users, $result);
       }
       return $users;
    }
    
  /*  
    public function getUsers() {
		$users = array();
		$st = $this->conn->prepare("SELECT userid,username,firstname,lastname,zipcode,city,email,phonenumber FROM user;");
		$results = array();
		if ($st->execute()) {
			while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$results[] = $row;
			}
		}
		foreach($results as $result) {
			$user = new User();
			$user->user_id = $result['userid'];
			$user->username = $result['username'];
            $user->first_name = $result['firstname'];
            $user->last_name = $result['lastname'];
            $user->zip = $result['zipcode'];
            $user->city = $result['city'];
            $user->email = $result['email'];
            $user->phonenumber = $result['phonenumber'];
            array_push($users, $user);
       }
	   return $users;
	}
*/
	public function apiGetUsers() {
		$st = $this->conn->prepare("SELECT userid AS user_id, username FROM user;");
		$st->execute();
		$st->setFetchMode(PDO::FETCH_ASSOC);
		$result = $st->fetchAll();
		return $result;
	}

	public function apiValidateUsers($username, $password) {
		$st = $this->conn->prepare("SELECT userid, password_hash FROM user WHERE username = :username;");
		$st->bindparam(':username', $username);
		$st->execute();
		$st->setFetchMode(PDO::FETCH_ASSOC);
		$result = $st->fetchAll();
		if (password_verify($password, $result[0]['password_hash'])) {
			return $result[0]['userid'];
		} else {
			return 'Error';
		}
	}

    public function saveuser() {
            if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) && isset( $_POST['firstname'] ) && isset( $_POST['lastname'] )
                && isset( $_POST['zip'] ) && isset( $_POST['city'] ) && isset( $_POST['email'] ) && isset( $_POST['phonenumber'] ) ) {

                    $stmt = $this->conn->prepare("SELECT userid FROM user WHERE username =:username");
                    $stmt->bindParam(':username',$_POST['username']);
                    $stmt->execute();
                    if(!$stmt->rowcount() < 1) {
                        $_SESSION['error'] = "choose new username";
                        header("Location: register");
                    }

                    $st = $this->conn->prepare("INSERT INTO user(username, password_hash, firstname, lastname, zipcode, city, email, phonenumber)
						VALUES(:username, :password, :firstname, :lastname, :zipcode, :city, :email, :phonenumber)");
                    $st->bindParam(':username', $_POST['username']);
                    $hashedPw = password_hash($_POST['password'],PASSWORD_DEFAULT);
                    $st->bindParam(':password', $hashedPw);
                    $st->bindParam(':firstname', $_POST['firstname']);
                    $st->bindParam(':lastname', $_POST['lastname']);
                    $st->bindParam(':zipcode', $_POST['zip']);
                    $st->bindParam(':city', $_POST['city']);
                    $st->bindParam(':email', $_POST['email']);
                    $st->bindParam(':phonenumber', $_POST['phonenumber']);
                    $st->execute();
                    $_SESSION['error'] = "Success";
                    header("Location: ../home");
                } else {
                    header("Location: register");
                }
            }

}

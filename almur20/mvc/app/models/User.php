<?php
class User extends Database {
	
	public function login(){
		$user = trim($_POST['input_username']);
        $pwd = trim($_POST['input_password']);

        filter_input(FILTER_SANITIZE_STRING, $user, FILTER_FLAG_NO_ENCODE_QUOTES);
        filter_input(FILTER_SANITIZE_STRING, $pwd, FILTER_FLAG_NO_ENCODE_QUOTES);

        try {
            $search_query = "SELECT user_id, username, password FROM user WHERE username=:username;";
            $stmt = $this->conn->prepare($search_query);
            $stmt->bindParam(':username', $user, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() >= 1) {
                //User exists
                $result = $stmt->fetch();
                //var_dump($result);
                if (password_verify($pwd, $result['password'])) {
                    //echo 'Correct password';
                    $_SESSION['logged_in'] = true;
					$_SESSION['username'] = $result['username'];
					$_SESSION['user_id'] = $result['user_id'];
                    //echo("<script>console.log('encontro usuario');</script>");
                    //console.log('Encontro usuario.');
                    $_SESSION['status_message'] = '';
                } else {
                    $_SESSION['status_message'] = '<p>Invalid username or password.</p>';
                    $_SESSION['logged_in'] = false;
                }
            } else {
                //User doesn't exists
                $_SESSION['status_message'] = '<p>Invalid username or password.</p>';
                $_SESSION['logged_in'] = false;
            }            

            //print_r($result);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function logout() {
        $_SESSION['logged_in'] = false;
    }

	public function register() {
		$user = trim($_POST['input_username']);
        $pwd = trim($_POST['input_password']);
		
        filter_input(FILTER_SANITIZE_STRING, $user, FILTER_FLAG_NO_ENCODE_QUOTES);
		filter_input(FILTER_SANITIZE_STRING, $pwd, FILTER_FLAG_NO_ENCODE_QUOTES);
		
		$pwd = password_hash($pwd, PASSWORD_DEFAULT);

		try {          
            $search_query = "SELECT username FROM user WHERE username=:username";
            $stmt = $this->conn->prepare($search_query);
            $stmt->bindParam(':username', $user, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //$results = $stmt->fetchAll();

            if ($stmt->rowCount() >= 1) {
                $_SESSION['status_message'] = 'User exists';
            }
            else {
                $insert_query = "INSERT INTO user (username, password)
                                VALUES (:username, :password)";

                $stmt = $this->conn->prepare($insert_query);
                $stmt->bindParam(':username', $user, PDO::PARAM_STR);
                $stmt->bindParam(':password', $pwd, PDO::PARAM_STR);

                $stmt->execute();

				$search_query = "SELECT user_id, username FROM user WHERE username=:username";
				$stmt = $this->conn->prepare($search_query);
				$stmt->bindParam(':username', $user, PDO::PARAM_STR);

				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				$results = $stmt->fetch();

				$_SESSION['logged_in'] = true;
				$_SESSION['username'] = $results['username'];
				$_SESSION['user_id'] = $results['user_id'];
                //echo "New record created successfully";
                //header('location:index.php');
                $_SESSION['status_message'] = '';
            }
        }
        catch(PDOException $e)
            {
            echo $insert_query . "<br>" . $e->getMessage();
        }
	}

	public function getAll () {

		$sql = "SELECT user_id, username FROM user";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

        $result = $stmt->fetchAll();
        
		return $result;
	}

}
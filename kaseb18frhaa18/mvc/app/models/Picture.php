<?php
class Picture extends Database {
	
	public function getAllUserPictures ($user_id) {
        $user_id = filter_var($user_id, FILTER_SANITIZE_STRING);

		$sql = "SELECT image, title, description FROM picture WHERE user_id = :user_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
    }
    
    public function addPicture($user_id){
        $username = filter_var(trim($_POST['json']["username"]), FILTER_SANITIZE_STRING);
        $password = filter_var(trim($_POST['json']["password"]), FILTER_SANITIZE_STRING);

		$sql = "SELECT user_id, username, password FROM users WHERE user_id = :user_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
		$stmt->execute();

        $result = $stmt->fetch();

        if($username===$result['username'] || password_verify($password, $result['password'])){
            $title = trim($title);
            $description = trim($description);
          
          
            if (empty($title) || empty($description) || empty($image)) {
            } elseif ((strlen($title) > 25) or (strlen($description)>250) or ((filesize($image*1.35) > 4294967295))){
            } else {
                $title = filter_var($title, FILTER_SANITIZE_STRING);
                $description = filter_var($description, FILTER_SANITIZE_STRING);
                $image = filter_var($image, FILTER_SANITIZE_STRING);
                $statement = 'insert into feed (head, description, photo, person_id) values(:head, :description, :photo, :person_id)';
                $stmt->bindParam(':head', $title);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':photo', $image);
                $stmt->bindParam(':person_id', $user_id);
                $stmt->execute();

                //return image id
            }      
        
        }
    }
    
}
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
        $user_id = filter_var($user_id, FILTER_SANITIZE_STRING);
        $username = filter_var(trim($_POST['json']["username"]), FILTER_SANITIZE_STRING);
        $password = filter_var(trim($_POST['json']["password"]), FILTER_SANITIZE_STRING);

		$sql = "SELECT user_id, username, password FROM users WHERE user_id = :user_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
		$stmt->execute();

        $result = $stmt->fetch();

        if($username===$result['username'] || password_verify($password, $result['password'])){
            $title = $_POST['json']["title"];
            $description = $_POST['json']["description"];
            $image = $_POST['json']["image"];
            if (empty($title) || empty($description) || empty($image)) {
            } elseif ((strlen($title) > 25) or (strlen($description)>250) or ((strlen($image) < 65535*8))){
            } else {
                $title = filter_var($title, FILTER_SANITIZE_STRING);
                $description = filter_var($description, FILTER_SANITIZE_STRING);
                $image = filter_var($image, FILTER_SANITIZE_STRING);
                $statement = 'insert into feed (title, description, image, user_id) values(:title, :description, :image, :user_id)';
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':image', $image);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();

                //return image id
                if ($conn->query($sql) === TRUE) {
                    $last_id = $conn->insert_id;
                    $image_id = array("image_id"=>$last_id);
                    return $image_id;
                }
            }      
        
        }
    }
    
}
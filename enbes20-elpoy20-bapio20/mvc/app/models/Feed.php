<?php
class Feed extends Database {
	public function load_feed(){
		$stmt="SELECT * FROM user INNER JOIN images ON user.id_user = images.user_id ORDER BY created DESC";
		$res = $this->conn->query($stmt);
		return $res;
	}
	public function upload($param_array){
		$stmt= $this->conn->prepare("INSERT INTO images (image, header, description, created, user_id) VALUES ( ?, ?, ?, ?, ?)");
		return $stmt->execute($param_array);
	}
}
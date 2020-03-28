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

	public function getImageUserApi($id){

		$sql = "SELECT id, header AS title, description, user_id FROM user INNER JOIN images ON user.id_user = images.user_id WHERE id_user = :id ORDER BY created DESC";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		//$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$result=$stmt->fetchAll(PDO::FETCH_OBJ);

		return $result;
	}
}

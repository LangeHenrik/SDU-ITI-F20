<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/alhen20_chset20/mvc/app/core/Database.php';
require_once 'User.php';

class Picture extends Database
{
	public $userModel;
	public function __construct()
	{
		parent :: __construct();
		$this->userModel = new User();
	}

	public function getAllPictures()
	{
		$stmt = $this->conn->prepare("SELECT site_user.username as username, picture.header as header, picture.description as description, picture.img as img
			FROM user_picture
			INNER JOIN site_user using (user_id)
			INNER JOIN picture using (picture_id)");
		$stmt->execute();
		$res = $stmt->fetchAll();
		return $res;
	}

	public function createPicture($username, $header, $picture, $description)
	{
		$user_id_q = $this->userModel->getUserId($username);
		$user_id = $user_id_q['user_id'];

		$stmt = $this->conn->prepare("INSERT INTO picture (img,header,description) VALUES (:img,:header,:description)");
		$stmt->bindParam(":img", $picture);
		$stmt->bindParam(":header", $header);
		$stmt->bindParam(":description", $description);
		$stmt->execute();

		$stmt = $this->conn->prepare("SELECT picture_id FROM picture WHERE img = :img AND header = :header AND description = :description");
		$stmt->bindParam(":img", $picture);
		$stmt->bindParam(":header", $header);
		$stmt->bindParam(":description", $description);
		$stmt->execute();
		$res=$stmt->fetch();

		$stmt = $this->conn->prepare("INSERT INTO user_picture VALUES (:userid,:pictureid)");
		$stmt->bindParam(":userid", $user_id);
		$stmt->bindParam(":pictureid", $res["picture_id"]);
		$stmt->execute();
		return  $res["picture_id"];
	}

	public function getPictureByQuery($q){
		$query = '%'.$q.'%';
		$stmt = $this->conn->prepare("SELECT site_user.username as username, picture.header as header, picture.description as description, picture.img as img
			FROM user_picture
			INNER JOIN site_user using (user_id)
			INNER JOIN picture using (picture_id)
			WHERE username LIKE :query
			OR header LIKE :query");
		$stmt->bindParam(":query", $query);
		$stmt->execute();
		$res = $stmt->fetchAll();
		return $res;
	}

	public function getPictureByUserId($id){
		$query = '%'.$id.'%';
		$stmt = $this->conn->prepare("SELECT picture.img as image, picture.header as title, picture.description as description
			FROM user_picture
			INNER JOIN picture using (picture_id)
			WHERE user_id=:id");
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		$res = $stmt->fetchAll();
		return $res;
	}
}

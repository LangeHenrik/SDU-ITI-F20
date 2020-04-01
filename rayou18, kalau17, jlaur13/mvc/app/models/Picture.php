<?php
class Picture extends Database {

    public function upload($username, $header, $description, $_FILES){
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        $base64 = $base64 = 'data:image/' . $file_ext . ';base64,' . base64_encode(file_get_contents($_FILES['image']['tmp_name']));


        $sql = "INSERT INTO picture (user, header, description, picture) VALUES ( :username , :header , :description , :base64 );";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':header', $header);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':base64', $base64);
        $stmt->execute();

        $result = $stmt->fetch(); //fetchAll to get multiple rows

        print_r($result);


        return true;
    }

    public function getAll () {

        $sql = "SELECT * FROM picture;";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

}
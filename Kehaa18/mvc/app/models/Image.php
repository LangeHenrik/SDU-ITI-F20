<?php
class Image extends Database
{
    public function getAll()
    {

        //Select all from images starting from the first ID and going upwards.
        $sql = "SELECT * FROM images ORDER BY id ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function upload()
    {
        if (isset($_FILES['file'])) {
            $file_name = filter_var($_FILES['file']['name'], FILTER_SANITIZE_STRING);
            $file_size =$_FILES['file']['size'];
            
            $file_type=strtolower(pathinfo(basename($file_name), PATHINFO_EXTENSION));
            
            $data = file_get_contents($_FILES['file']['tmp_name']);
            $base64 = base64_encode($data);
            $base64 = 'data:image/' . $file_type . ';base64,' . $base64;
            $header = filter_var($_POST["header"], FILTER_SANITIZE_STRING);
            $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
            
            $stmt = $this->conn->prepare("INSERT INTO images (header, 
                                            description, image, user_id, name)
                                            VALUES(:header, :description, :image, :user_id, :name)");
            $stmt->bindParam(':user_id', $_SESSION["user_id"]);
            $stmt->bindParam(':header', $header);
            $stmt->bindParam(':name', $file_name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $base64);
            $stmt->execute();
            return true;
        }
    }
}

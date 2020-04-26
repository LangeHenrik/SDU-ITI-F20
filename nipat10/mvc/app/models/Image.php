<?php
class Image extends Database
{
    //Gets all images from db and returns them
    public function getAll()
    {
        //Select all from images starting from the first ID and going upwards.
        $sql = "SELECT * FROM images ORDER BY id ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //Saves an image to the db, from the file in the request.
    //Parameters are filtered and sanitized to prevent attacks to the system.
    public function upload()
    {
        if (isset($_FILES['file'])) {
            $file_name = filter_var($_FILES['file']['name'], FILTER_SANITIZE_STRING);
            $file_size =$_FILES['file']['size'];
            
            $file_type=strtolower(pathinfo(basename($file_name), PATHINFO_EXTENSION));

            $file = $_FILES['file'];
            $fileError = $file['error'];
            $fileSize = $file['size'];
            
            $data = file_get_contents($_FILES['file']['tmp_name']);
            $base64 = base64_encode($data);
            $base64 = 'data:image/' . $file_type . ';base64,' . $base64;
            $header = filter_var($_POST["header"], FILTER_SANITIZE_STRING);
            $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
            
            //Valid file extensions
            $extensions_arr = array('jpg', 'jpeg', 'png');


            //Check extension of file
            if (in_array($file_type, $extensions_arr)) {
                if ($fileError === 0) {
                    if ($fileSize < 2000000) {
                        $stmt = $this->conn->prepare("INSERT INTO images (header, 
                                            description, image, user_id, name)
                                            VALUES(:header, :description, :image, :user_id, :name)");
                        $stmt->bindParam(':user_id', $_SESSION["user_id"]);
                        $stmt->bindParam(':header', $header);
                        $stmt->bindParam(':name', $file_name);
                        $stmt->bindParam(':description', $description);
                        $stmt->bindParam(':image', $base64);

                        try {
                            $stmt->execute();
                        } catch (PDOException $e) {
                            return;
                        }
                        return;
                    } else {
                        //Filesize too big
                        return;
                    }
                } else {
                    //Error detected when uploading
                    return;
                }
            } else {
                //Wrong extension
                //File type not allowed
                return;
            }
        }
    }
}

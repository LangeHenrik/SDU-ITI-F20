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
        $header = trim($_POST["header"]);
        $description = trim($_POST["description"]);


        if (empty($header) || empty($description) || empty($_FILES["file"]["tmp_name"])) {
            //echo '<script>alert("Upload Failed. Header or Description is empty or no file was selected!")</script>';
        } elseif ((strlen($header) > 25) or (strlen($description) > 250) or ((filesize($_FILES["file"]["tmp_name"]) * 1.35) > 4294967295)) {
            //echo '<script>alert("Max titlelength: 25 characters.\nMax description lenght: 250 characters.\nImage file might be too large.")</script>';
        } else {
            $name = $_FILES['file']['name'];
            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            //husk at indsætte head og description også
            $head = filter_var($_POST['header'], FILTER_SANITIZE_STRING);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

            // Select file type
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("jpg", "jpeg", "png", "gif");

            // Check extension
            if (in_array($imageFileType, $extensions_arr)) {

                // Convert to base64 
                $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
                $photo = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
                // Insert record
                $statement = 'insert into images (header, description, image, username) values(:header, :description, :image, :user_id)';
                /*$parameters = array(
                    array(":head", $head), array(":description", $description),
                    array(":photo", $photo), array(":person_id", $_SESSION['id'])
                );

                talkToDB($statement, $parameters);
                */
                $stmt = $this->conn->prepare($statement);
                $stmt->bindParam(':header', $header);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':image', $photo);
                $stmt->bindParam(':user_id', $_SESSION['user_id']);
                $stmt->execute();
            }
        }
    }
}

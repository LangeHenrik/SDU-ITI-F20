<?php
class Picture extends Database
{
    //pasword for virk_1= v1rkPls!

    public function getAllUserPictures($user_id)
    {
        $user_id = filter_var($user_id, FILTER_SANITIZE_STRING);

        $sql = "SELECT image_id, title, description, image FROM picture WHERE user_id = :user_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        $result = $stmt->fetchAll();

        for ($i = 0; $i < count($result); $i++) {
            $result[$i]['image_id'] = (int) $result[$i]['image_id'];
            unset($result[$i][0]);
            unset($result[$i][1]);
            unset($result[$i][2]);
            unset($result[$i][3]);
        }

        return $result;
    }

    public function addPicture($user_id)
    {
        $user_id = filter_var($user_id, FILTER_SANITIZE_STRING);
        $jsonBody = json_decode($_POST['json']);
        $username = filter_var(trim($jsonBody->username), FILTER_SANITIZE_STRING);
        $password = filter_var(trim($jsonBody->password), FILTER_SANITIZE_STRING);

        $sql = "SELECT user_id, username, password FROM user WHERE user_id = :user_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        $result = $stmt->fetch();

        //Måske lav test på image, om den overholder image kriterier.
        //kan gøres med at dele stringen op, for at se om den over formen, som sendes
        //eks: $photo = 'data:image/' . $imageFileType . ';base64,' . $image_base64; => dette er hvad der indsættes i databasen
        // $extensions_arr = array("jpg", "jpeg", "png", "gif"); på imagefiletype

        if ($username === $result['username'] && password_verify($password, $result['password'])) {
            $title = $jsonBody->title;
            $description = $jsonBody->description;
            $image = $jsonBody->image;
            if (empty($title) || empty($description) || empty($image)) {
            } elseif ((strlen($title) > 25) or (strlen($description) > 250)) {
            } else {
                $title = filter_var($title, FILTER_SANITIZE_STRING);
                $description = filter_var($description, FILTER_SANITIZE_STRING);
                $image = filter_var($image, FILTER_SANITIZE_STRING);
                $sql = 'insert into picture (title, description, image, user_id) values(:title, :description, :image, :user_id)';
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':image', $image);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();

                $last_id = $this->conn->lastInsertId("image_id");
                return array("image_id" => $last_id);
            }
        }
    }
}
<?php
class Picture extends Database
{

    function getPictures($id)
    {

        $sql = 'SELECT * FROM view1 Where id=:id';
        $images = array();
        $data = $this->conn->prepare($sql);

        $data->bindParam(':id', $id);
        $data->execute();
        while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)) {
            $images[] = array(
                'Image' => $OutputData['path'],
                'Title' => $OutputData['header'],
                'Description' => $OutputData['description']
            );
        }
        echo json_encode($images, JSON_PRETTY_PRINT);

        
    }

    function postPictures($id)
    {
        
    }
}

<?php

class ImageFeed extends Database
{


    function is_dir_empty($dir)
    {
        if (!is_readable($dir)) return NULL;
        return (count(scandir($dir)) == 2);
    }

    function showImages()
    {
        $files = glob("images/*.*");
        for ($i = 0; $i < count($files); $i++) {
            $image = $files[$i];
            $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
            );

            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        }

        $dir = "images/";

        if (ImageFeed::is_dir_empty($dir)) {
        } else {
            if (in_array($ext, $supported_file)) {
                $stmt = $this->conn->query("SELECT name,user, description, header, image  FROM images");

                $result = $stmt->fetchAll();

                return $result;
            } else {
            }
        }
    }


}
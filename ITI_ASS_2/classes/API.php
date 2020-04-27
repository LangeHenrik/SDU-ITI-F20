<?php
class API {

    public function getUsers() {
        $getUsers = DB::getInstance()->getAll('users');
        $users = array();
        foreach($getUsers->results() as $getUsers){
            $users[] = array(
                'user_id' => $getUsers->id,
                'username' => $getUsers->username
            );
        }
        return json_encode($users);
    }

    public function uploadImage() {
        $response = array();
        $jsonData = file_get_contents('php://input');
        $jsonDecode = json_decode($jsonData, true);

        if (is_array($jsonDecode)) {
            foreach ($jsonDecode as $key => $value) {
                $_POST[$key] = $value;
            }
        }

        if (@$_POST['image'] && @$_POST['title'] && @$_POST['description'] && @$_POST['uploadby']) {
            $upload = DB::getInstance()->insert('images', array(
                'image' => $_POST['image'],
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'uploadby' => $_POST['uploadby']
            ));
            
            if ($upload) {
                $response["MESSAGE"] = "SAVE DATA SUCCESS";
                $response["STATUS"] = 200;

                $getUploadInfo = DB::getInstance()->getAll('images');
                foreach($getUploadInfo->results() as $getUploadInfo) {
                    $response[] = array(
                        'image_id' => $getUploadInfo->id,
                        'image' => $getUploadInfo->image,
                        'title' => $getUploadInfo->title,
                        'description' => $getUploadInfo->description,
                        'username' => $getUploadInfo->uploadby
                    );
                }
            } else {
                $response["MESSAGE"] = "SAVE DATA FAILED";
                $response["STATUS"] = 500;
            }
        } else {
            $response["MESSAGE"] = "INVALID REQUEST";
            $response["STATUS"] = 400;
        }
        return json_encode($response);
    }

    public function getUploadById($id) {
        $DB = DB::getInstance();
        $getUser = $DB->query("SELECT username FROM users WHERE id = {$id}")->results();
        if ($getUser) {
            //print_r($getUser[0]->username); //point to index 0 and get username
            $getUploads = $DB->get('images', array('uploadby', '=', $getUser[0]->username));
            $uploads = array();
            foreach($getUploads->results() as $getUploads){
                $uploads[] = array(
                    'image' => $getUploads->image,
                    'title' => $getUploads->title,
                    'description' => $getUploads->description
                );
            }
            return json_encode($uploads);
        } else {
            echo 'Error: No user with that ID.';
        }
    }

}
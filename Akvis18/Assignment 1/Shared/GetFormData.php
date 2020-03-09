<?php
function getAndMatchPost($name, $regex){
    global $errors;
    if (isset($_POST[$name])){
        $value = htmlentities($_POST[$name]);
        if (preg_match($regex, $value)){
            return $value;
        } else {
            $errors[] = 'Please enter a valid ' . $name;
            return false;
        }
    }
    $errors[] = 'Please enter a ' . $name;
    return false;
}

function getImage($name){
    global $errors;
    if(isset($_FILES[$name])){
        $ext = array('jpg','jpeg','png','gif');
        $file_name = $_FILES[$name]['name'];
        $file_ext = pathinfo($file_name)['extension'];
        $file_size = $_FILES[$name]['size'];
        $file_tmp = $_FILES[$name]['tmp_name'];

        if (!in_array($file_ext,$ext)){
            $errors[]='File must be jpg, jpeg, png or gif';
            return null;
        }
        if ($file_size > 2097152){
            $errors[] = 'Max file size is 2mb';
            return null;
        }
        return file_get_contents($file_tmp);
    }
    return null;
}
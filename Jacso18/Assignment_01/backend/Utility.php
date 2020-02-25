<?php

Class Utility {

    public static function redirectIfNotLoggedIn(){
        if($_SESSION['logged_in'] == false){
            header ("Location: index.php");
        }  
    }

    public static function logoutPressed(){
        if(isset($_POST['logout'])) {
            echo 'logout';
            $_SESSION['logged_in'] = false;
            header ("Location: index.php");
        }
    }

    public static function decodeImageString($base64_string){
    $decoded = '';
    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $base64_string );

        if(sizeof($data) == 1){
        $decoded = base64_decode($data[1]);
        } 
            
    
    
    return $decoded; 
    }


}

?>
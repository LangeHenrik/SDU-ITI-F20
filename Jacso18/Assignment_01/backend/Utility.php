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

    public static function regexCheck($username,$password,$email){
        $usrRegex = '/[A-Za-zÆØÅæøå1-9]{1,}/';
        $pswdRegex = '/[A-Za-zÆØÅæøå\d@$!%*#?&]{8,}/';
        $mailRegex = '/\S+@\S+\.([a-z]|[A-Z]){1,5}/';
        if(preg_match($usrRegex,$username) && preg_match($pswdRegex,$password) && preg_match($mailRegex,$email)){
            return true;
        } else {
            return false;
        }
    }


}

?>
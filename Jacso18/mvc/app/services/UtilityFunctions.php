<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/jacso18/mvc/app/core/Controller.php';
class UtilityFunctions
{


    public function __construct()
    {
    }

    public static function regexCheck($username, $password, $email)
    {
        $usrRegex = '/[A-Za-zÆØÅæøå1-9]{1,}/';
        $pswdRegex = '/[A-Za-zÆØÅæøå\d@$!%*#?&]{8,}/';
        $mailRegex = '/\S+@\S+\.([a-z]|[A-Z]){1,5}/';
        if (preg_match($usrRegex, $username) && preg_match($pswdRegex, $password) && preg_match($mailRegex, $email)) {
            return true;
        } else {
            return false;
        }
    }
}

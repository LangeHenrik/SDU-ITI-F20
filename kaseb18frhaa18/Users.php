<?php
//get all users into array
require 'database.php';

if (!isset($users)) {
    $statement = "SELECT username, name FROM person";
    $users = getInfoFromDB($statement);
}

$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = filter_var($q, FILTER_SANITIZE_STRING);
    $q = strtolower($q);
    $len=strlen($q);
    foreach($users as $name) {
        if (stristr($q, substr($name[0], 0, $len))or stristr($q, substr($name[1], 0, $len))) {
            //make values into a part of list
            if ($hint === "") {
                $hint = $name;
            } else { 
                $hint .= ", $name";
            }
        }
    }
}

// 
echo $hint === "" ? "no suggestion" : $hint;
?>
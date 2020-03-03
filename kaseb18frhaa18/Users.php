<?php
error_reporting(0);
//get all users into array
require 'database.php';

$statement = "SELECT name, username FROM person";
$users = talkToDB($statement);

print_r ($users);

$q = $_REQUEST["q"];
print_r($q);

$hint = "<tr><th>Name</th>
<th>Username</th>
</tr>";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = filter_var($q, FILTER_SANITIZE_STRING);
    $q = strtolower($q);
    $len=strlen($q);
    foreach($users as $name) {
        print_r($name);
        if (stristr($q, substr($name[name], 0, $len)) || stristr($q, substr($name[username], 0, $len))) {
            $hint .= "<tr> <td> $name[name] </td> <td> $name[username] </td> <tr>";

        }
    }
}

// 
echo $hint;
?>
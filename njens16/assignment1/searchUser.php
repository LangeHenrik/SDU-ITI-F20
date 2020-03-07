<?php
require_once "config.php"; 
try
{    
    $conn = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT username FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_COLUMN);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
 
// get the q parameter from URL
$q = $_REQUEST["q"];

$search_result = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($users as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($search_result === "") {
                $search_result = $name;
            } else {
                $search_result .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $search_result === "" ? "No results" : $search_result;
?> 

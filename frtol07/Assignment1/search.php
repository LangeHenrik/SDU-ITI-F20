<?php
include('functions.php');
$userArray = array();

//Get user list

require_once 'db_config.php';
include 'connect.php';


$stmt = $pdo->query("SELECT username FROM users");

while ($row = $stmt->fetch()) {
    echo "<br>";
    $userArray[] = $row;
}


$search = htmlspecialchars($_REQUEST["search"]);

$hint = "";

if ($search !== "") {

    echo "  <br> ";
    echo "  <br> ";

    echo "  <br> ";

    $isFound = false;
    foreach ($userArray as &$value) {
        echo "  <br> ";
        if (strtolower($value['username']) === strtolower($search)) {
            $isFound = true;
            $searchResult = "Match  found";
        }
    }
    if ($isFound === false) {
        $searchResult = "Match not found";
    }
}

echo "<input value=\"$searchResult \" class='label' > </input><br>";
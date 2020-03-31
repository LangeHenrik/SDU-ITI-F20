<?php

$usersUrl = "http://localhost:8099/Exercises/mvc/public/api/users";
$usersJson = file_get_contents($usersUrl);

echo $usersJson;

//$usersObject = json_decode($locationJson);
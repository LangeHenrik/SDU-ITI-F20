<?php
include_once('DBConnection.php');
include_once('DBController.php');
include_once('UserController.php');


$usercontroller = new UserController();

$userlistDataArray = $usercontroller->getAllUsersForUserlist();

$data = array();

if ($userlistDataArray) {
    foreach($userlistDataArray as $row) {
        array_push($data, $row);
    }
}

echo json_encode($data);
exit();
?>
<?php
include_once('DBConnection.php');
include_once('DBController.php');

$dbconnection = new DBConnection();


$select_query = 'SELECT username, fullname FROM users';
$prepare_statement = $dbconnection->openConnection()->prepare($select_query);
//$prepare_statement->execute();
//$query_result = $prepare_statement->fetchAll();

$data = array();

if ($prepare_statement->execute()) {
    while ($row = $prepare_statement->fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $row);
    }
}

echo json_encode($data);
exit();

?>
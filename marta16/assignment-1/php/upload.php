<?php

require_once "db.php";

// start session
session_start();

// connect to database (PDO)
$db = DB();

// get the posted JSON data
$json = file_get_contents("php://input");
$post = json_decode($json);

$username = $_SESSION["username"];
$title = filter_var($post->title, FILTER_SANITIZE_STRING);
$description = filter_var($post->description, FILTER_SANITIZE_STRING);;
$img = $post->img;
$file_size = (int)(strlen(rtrim($img, "=")) * 3 / 4);

// file size restriction
if ($file_size > 2097152)
  die("File too large. File must be less than 2 megabytes.");

// file type restriction
// https://stackoverflow.com/a/53853171
$allowed_types = ["png", "jpg", "jpeg"];
if (!in_array(str_replace(["data:image/", ";", "base64"], ["", "", "",], explode(",", $img)[0]), $allowed_types))
  die("File is not of allowed image type.");

// insert post into database
try {

  // prepare query
  $query = $db->prepare("INSERT INTO posts(username, title, description, img) VALUES (:username, :title, :description, :img)");

  // bind parameters (sanitize)
  $query->bindParam(':username', $username);
  $query->bindParam(':title', $title);
  $query->bindParam(':description', $description);
  $query->bindParam(':img', $img);

  // execute query
  $query->execute();

  // record assigned id
  $id = $db->lastInsertId();

} catch (PDOException $e) {

  die($e->getMessage());

}

// everything went well
echo("success");

?>
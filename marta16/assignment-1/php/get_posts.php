<?php

require_once "db.php";

// connect to database (PDO)
$db = DB();

// get all posts
$data = $db->query("SELECT * FROM posts")->fetchAll();

$posts = array_map(function($row) {
    return array("username"=>$row["username"], "title"=>$row["title"], "description"=>$row["description"], "img"=>$row["img"]);
}, $data);

$json = json_encode($posts);

echo($json);
return;

?>
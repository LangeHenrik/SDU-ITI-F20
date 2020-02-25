<?php
$servername = "localhost:3307";
$username = "root";
$password = "KatharinaOdens3";

$searchItem = $_POST['search'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=search", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Search result:";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

    $sql = "SELECT * 
            FROM book 
            WHERE book_title LIKE '%$searchItem%' 
            OR author_name LIKE '%$searchItem%' 
            OR publisher_name LIKE '%$searchItem%';";
    $stmt = $conn->prepare( $sql );
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach ($result as $row) {
        echo "<br />\n"."Book title: ".$row['book_title']."<br />\n".
            "Author name: ".$row['author_name']."<br />\n".
            "Publisher: ".$row['publisher_name']."<br />\n";
    }


    



?> 
<!DOCTYPE html>
<head>
    <title>Semester feed</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div class="navbar">
    <a href="Imagepage.php">Images</a>
    <a href="Uploadpage.php">Upload</a>
    <a href="Userlist.php">Users</a>
</div>

<?php
require_once'db_config.php';
echo "<table>";
echo "<tr><th>Firstname</th><th>Lastname</th><th>Username</th><th>Emai</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
    $stmt = $conn->prepare("SELECT firstname, lastname, username, email FROM user");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
echo "</table>";
?>

</body>
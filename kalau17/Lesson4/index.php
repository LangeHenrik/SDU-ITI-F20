<?php

?>
<form class="search" name="search" method="post">
  <input type="text" name="name" value="">
  <input type="submit" name="" value="">
</form>
<?php
$table ="<table style=\"width:100%\">
          <tr>
            <th>id</th>
            <th>Auther</th>
            <th>Book</th>
          </tr>";


  $servername = "localhost";
  $username = "php";
  $password = "1234";
  $dbname = "Library";
if($_POST){
  try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname",
  $username,
  $password,
  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $stmt = $conn->prepare("SELECT * FROM Author WHERE Author_Id LIKE '%$_POST[name]%' || Author_name LIKE '%$_POST[name]%' || Book_title LIKE '%$_POST[name]%';");
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  maketable($result);
  //print_r($result);
  } catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  }
  $conn = null;
}

function maketable($resultArray){
  global $table;
    foreach ($resultArray as  $value) {
      makerow($value);
    }

    $table += "</table>";

}



function makerow($valuerow){
  global $table;
  $table += "<tr>";
  foreach ($valuerow as $value2) {
    $table += "<td>".$value2."</td>";
    print($value2);
    echo "</br>";
  }
  $table += "</tr>";
}
echo $table;
  ?>

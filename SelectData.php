
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/javascript" src="js/script.js">   
</script>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="content">

<div class="topnav">
    <a href="welcome.php">Home</a>
    <a href="UploadImage.php">Upload Image</a>
    <a href="SelectData.php">User List</a>
    <a href="login.php">Log out</a>
    
</div>

<div>
    <div class="wrapper">
        <h2>Users List</h2>
      
    </div>

</body>
</html>


<?php

try{
    $pdo = new PDO("mysql:host=localhost;dbname=myDBPDO", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
try{
    $sql = "SELECT * FROM users";    

    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>username</th>";
                echo "<th>passward</th>";
    
                echo "<th>created at</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['u_name'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";

                echo "<td>" . $row['created_at'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
       
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
unset($pdo);
?>

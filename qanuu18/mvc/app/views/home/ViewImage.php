



<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="extfiles/styling.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Page</title>


</head>
<body>


<?php
if(isset($_SESSION['username'])){
    echo "<br><a href='http://localhost:8080/qanuu18/mvc/public/home/login'><input type=button value='Go back to Main Menu' name=Menu></a>";



}





  

foreach($viewbag as $row) {


    echo "<img src='data:$row[Filetype];base64,$row[img]' alt='$row[Header]'>";
    echo "<h3>".$row["Header"]."</h3>";
    echo "<p>".$row["description"]."</p>";
    echo "<p>".$row["username"]."</p>";


}


?>


</body>


</html>
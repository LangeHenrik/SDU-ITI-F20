



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
    echo "<br><a href='logout.php'><input type=button value=Logout name=logout></a>";
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
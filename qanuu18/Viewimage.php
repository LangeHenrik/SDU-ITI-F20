<?php

session_start();

if(isset($_SESSION['username'])){
    echo "<br><a href='logout.php'><input type=button value=Logout name=logout></a>";
}
else{
    echo "<script> alert('Please login to procede! Please check your credentials.') </script>";
    echo "<script> location.href = 'index.php' </script>";
}

require_once 'extfiles/config.php';
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="extfiles/styling.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Page</title>
<form action="http://localhost:8080/imagefeed.php">
    <input type="submit" value="Go to main menu" />
</form>
</head>
<body>





<?php

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $conn->prepare("SELECT * FROM images");
    $query->execute();
    while($result =  $query->fetch(PDO::FETCH_ASSOC)){

    echo "<img src='data:$result[Filetype];base64,$result[img]' alt='$result[Header]'>";
     echo "<h3>".$result["Header"]."</h3>";
     echo "<p>".$result["description"]."</p>";
     echo "<p>".$result["username"]."</p>";


    }
    $conn = null;
}
    catch(PDOException $e)
    
    {
        echo "Error: " . $e->getMessage();
    }


    

        
    ?>

</body>
</html>
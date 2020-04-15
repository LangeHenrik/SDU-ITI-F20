<?php
session_start(); 
if($_SESSION['logged_in']) : ?>

<!DOCTYPE html>
<html>
    <head>
    <title> Leroy jenkins</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
<body>
    <div class=wrapper> 
        <div class= content>
            <h1> Upload your picture here </h1>
        <form class="Upload-form" action ="upload.php" method="POST">
        <label for="Image title"> Image title:</label> <br>
        <input type="text" name="header" placeholder="header"> <br>
        <label for="Description"> Description:</label> <br>
        <input type="text" name="description" placeholder="description"> <br>
        <label for="imageblob"> imageblob:</label> <br>
        <input type="text" name="imageblob" placeholder="imageblob"> <br>
        <button type="submit" name="upload">upload</button>
        </div>       

        <div class=link>
        <p><a href="imagepage.php"> Wanna browse the coolest pictures? Click here</a></p>
        </div>  
    
    </div>


</body>
</html>



<?php else : ?>
    <h1> Log in please</h1>

<?php endif; 
?>
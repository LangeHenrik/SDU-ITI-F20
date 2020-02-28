<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styling.css">
    <title>Upload page</title>
</head>
<body>
    <div class="content" id="upload">
        <script src="./javascript/Menu.js"></script>
        <h1>Upload page</h1>
            <h2>Here you can upload your pictures</h2>
                <form method="POST" action=>
                    <fieldset>            
                        <legend>Upload image:</legend>   
                        <label for = "header">Image title:</label>
                        <br>
                        <input type="text" name="header" placeholder="Select title" autofocus>
                        <br>
                        <label for="description">Description:</label>
                        <br>
                        <textarea id="description" rows="4" cols="50">Here you can write the description for the image.
                        </textarea>
                        <br>
                        <label for="img">Select image:</label>
                        <br>
                        <input type="file" id="img" name="img" accept="image/*">
                        <br>
                        <input type="submit" name="submit" value="Upload">
                        
                        
                    </fieldset>
            </form>
        <p>If you are having trouble uploading, please contact support.</p>
        <br>
    </div>
</body>
</html>
<?php

// $username="username"; //hardvoded TODO get password from input
// $password='Passw0rd8'; //hardcoded TODO get password from input

// session_start();

// if(isset($_SESSION['username'])){
//     //echo "<h1>Welcome ".$_SESSION['username']."</h1>";
//     //echo "<a href='product.php'>Product</a><br>";
//     //echo "<br><a href='logout.php'><input type=button value=logout name=logout></a>";
// }
// else{
//     if($_POST['username']==$username && $_POST['password']==$password){
//         $_SESSION['username']=$username;
//         echo "<script>location.href='Upload.php'</script>";
//     }
//     else{
//         echo "<script>alert('Please login to procede! Please check your credentials.')</script>"; 
//         echo "<script>location.href='index.php'</script>";
//     }
// }
?>
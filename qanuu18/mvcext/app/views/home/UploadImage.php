


    <?php
if(isset($_SESSION['username'])){
    echo "<br><a href='logout.php'><input type=button value=Logout name=logout></a>";
}
else{
    echo "<script> alert('Please login to procede! Please check your credentials.') </script>";
    echo "<script> location.href = 'index.php' </script>";
}
?>

    <html lang="en">

    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="extfiles/styling.css">

        <title>uploadimage</title>
    </head>

    <body>    
    <div id="frm">
        <div class="container">
            <div class="row">



            <form action="qanuu18/mvc/public/home/menu">
                <input type="submit" value="Go to main menu" />
                </form>
                <form action="UploadImage.php" method="POST" enctype="multipart/form-data">
            
                    <h3 class="text-center">Upload image</h3>

                    <label for="Header">Title for image</label>
                    <br>
                    <input type="text" name="header">
                    <br>
                    <br>
                    <label for="profileimage">Choose image</label>
                    <input type="file" accept="image/*" name="profileimage">
                    <br>
                    <br>
                    <label for="Description">Description</label>
                    <br>
                    <textarea name="description" id="description" class="form-control" 
                    placeholder="Describe your image..."></textarea>
                    
                    <button type="submit" name="upload" class="btnupload btnupload-primary btnupload-block">Upload Image</button>

                </form>

            </div>
        </div>
    </div>

    </body>

    </html>

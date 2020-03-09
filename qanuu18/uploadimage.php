<?php include 'processForm.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="extfiles/styling.css">

    <title>uploadimage</title>
</head>

<body>
    <div class="container">
        <div class="row">
        
            <form action="uploadimage.php" method="post" enctype="multipart/form-data">

            <h3 class="text-center">Upload image</h3>

            
            
                    <label for="Header">Title for image</label>
                    <br>
                    <input type="text" name="Header" >
                    
                    <br>
                    
                <label for="profileimage">Profile image</label>
                <input type="file" name="profileImage" >
                <br>
        
                
                    <label for="Description">Description</label>
                    <textarea name="Description" id="Description" class="form-control"></textarea>
                    
                        <button type="submit" name = "upload-image" class="btnupload btnupload-primary btnupload-block">Upload Image</button>
                
                
            </form>

        </div>
    </div>
</div>

</body>

</html>
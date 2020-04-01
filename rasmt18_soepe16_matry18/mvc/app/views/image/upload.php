<?php include '../app/views/partials/menu.php'; ?>

<div class="content" id="upload">
        <h1>Upload page</h1>
            <h2>Here you can upload your images</h2>
               <form action="/rasmt18_soepe16_matry18/mvc/public/Image/uploadImage" method ="POST" enctype = "multipart/form-data">
               <fieldset>
                    <legend>Upload image:</legend>   
                    <label for="header">Image title:</label>
                    <br>
                    <input type="text" name="header" placeholder="Select title" autofocus required>
                    <br>
                    <label for="description">Description:</label>
                    <br>
                    <textarea id="description" name="description" placeholder="Here you can write the description for the image." rows="4" cols="50" required></textarea>
                    <br>
                    <label for="image">Select image:</label>
                    <br>
                    <input type ="file" name ="image" accept=".png,.jpeg" required/>
                    <input type ="submit" value="Submit" name="submit"/>
                </fieldset>
            </form>
        <p>If you are having trouble uploading, please contact support.</p>
        <br>
      </form>
      <?php include '../app/views/partials/foot.php'; ?>
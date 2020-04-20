<?php include '../app/views/partials/menu.php'; ?>
<div class="content" id="upload">
    <div class="jumbotron bg-white">
        <h1>Upload page</h1>
        <h2>Here you can upload your images</h2>
        <hr>
        <form action="/rasmt18_soepe16_matry18/mvc/public/Image/upload" method ="POST" enctype = "multipart/form-data">
            <div class="form-group">
                <fieldset>
                    <legend>Upload image:</legend>   
                    <label for="header">Image title:</label>
                    <br>
                    <input class="form-control" type="text" name="header" placeholder="Select title" autofocus required>
                    <br>
                    <label for="description">Description:</label>
                    <br>
                    <textarea class="form-control" id="description" name="description" placeholder="Here you can write the description for the image." rows="4" cols="50" required></textarea>
                    <br>
                    <label for="image">Select image(The chosen file types can be PNG and JPEG):</label>
                    <br>
                    <input class="form-control" type ="file" name ="image" accept=".png,.jpeg" required/>
                    <br>
                    <input class="btn btn-primary" type ="submit" value="Submit" name="submit"/>
                </fieldset>
            </div>
        </form>
        <?php if(isset($viewbag['succes'])) 
            {
                ?>
                <div class="alert alert-success alert-dismissible" fade show role="alert">
                    <?= $viewbag['succes'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            } elseif(isset($viewbag['danger'])) 
            { ?>
                <div class="alert alert-danger alert-dismissible" fade show role="alert">
                    <?= $viewbag['danger'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }?>
            <hr>
        <p class="text-info">If you are having trouble uploading, please contact support.</p>
        <br>
    </div>
</div>
<?php include '../app/views/partials/foot.php'; ?>
<?php
$title = "Upload new post";
include_once '../app/views/partials/Navbar.php';
?>

<div class="container center">
    <form id="new-post" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>New post:</legend>
            <label for="title">Post title</label> <br/>
            <input type="text" name="title" id="title" required/> <br/>
            <p class="info" id="title-info"></p>

            <labe for="image">Select post picture</labe> <br/>
            <input name="image" type="file" accept="image/*" onchange="loadFile(event)" required><br/>
            <img id="preview"/>
            <script>
                let loadFile = function(event) {
                    let output = document.getElementById('preview');
                    output.src = URL.createObjectURL(event.target.files[0]);
                };
            </script><br/>

            <label for="description">Description</label><br/>
            <textarea minlength="1" maxlength="255" rows="4" cols="50" name="description" form="new-post" placeholder="Enter description" required></textarea>
            <br/>
            <button type="submit">Create new post</button>
        </fieldset>
    </form>
    <?php
    if (isset($viewbag['errors'])){
        if (!empty($viewbag['errors'])){
            print '<br/>';
            foreach ($viewbag['errors'] as $error){
                print $error . '<br//>';
            }
        } else {
            print '<h2>Upload successful</h2>';
        }
    }
    ?>
</div>

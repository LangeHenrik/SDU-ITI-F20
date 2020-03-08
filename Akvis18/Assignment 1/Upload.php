<?php
include_once "Shared/CheckIfLoggedIn.php";
$title = "Upload new post";
include_once 'Shared/Navbar.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    include_once 'Shared/GetFormData.php';
    $errors = array();
    $title = getAndMatchPost('title','/^.{1,50}$/');
    $description = getAndMatchPost('description', '/^.{1,255}$/');
    $image = getImage('image');

    if (empty($errors)){
        include_once 'Shared/DBConnect.php';
        query('INSERT INTO post (user_id, title, description, image) VALUES (?, ?, ?, ?);',[$_SESSION['id'], $title, $description, $image]);
    }
}
?>

<div class="container center">
    <form id="new-post" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>New post:</legend>
            <label for="title">Post title</label> <br>
            <input type="text" name="title" id="title" required/> <br>
            <p class="info" id="title-info"></p>

            <labe for="image">Select post picture</labe> </br>
            <input name="image" type="file" accept="image/*" onchange="loadFile(event)" required></br>
            <img id="preview"/>
            <script>
                let loadFile = function(event) {
                    let output = document.getElementById('preview');
                    output.src = URL.createObjectURL(event.target.files[0]);
                };
            </script></br>

            <label for="description">Description</label></br>
            <textarea minlength="1" maxlength="255" rows="4" cols="50" name="description" form="new-post" placeholder="Enter description"></textarea>
            </br>
            <button type="submit">Create new post</button>
        </fieldset>
    </form>
    <?php
    global $errors;
    if (isset($errors)){
        if (!empty($errors)){
            foreach ($errors as $error){
                print $error . '</br>';
            }
        } else {
            print '<h2>Upload successful</h2>';
        }
    }
    ?>
</div>

<?php include '../app/views/partials/menu.php'; ?>
<div class="content" id="content">
    <div class="jumbotron bg-white">
        <h1>Image Feed</h1>
        <h2>Look at all the cool images below</h2>
        <button class="btn btn-primary" type="button" id="loadImages" name="loadImages" onclick="return getImage()">Load images!</button>
        <hr>
        <div id="imageContainer">
        </div>
    </div>
</div>
<?php include '../app/views/partials/foot.php'; ?>
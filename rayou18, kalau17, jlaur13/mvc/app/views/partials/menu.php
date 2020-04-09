<!--<html>-->
<!--    <head>-->
<!--    <script src="../js/js.js"></script>-->
<!--    </head>-->
<!--    <body>-->
<!---->
<!--<div style="background-color: lightblue;">Menu partial view</div>-->

<?php //if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
<!---->
<!--<a href="/Henrik/mvc/public/user/logout">log out</a>-->
<!---->
<?php //endif; ?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="mx-auto order-0">
        <a class="navbar-brand" href="#">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=../../public/imagefeed>Image Feed</a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="/rayou18,%20kalau17,%20jlaur13/mvc/public/Upload">Upload Image</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/rayou18,%20kalau17,%20jlaur13/mvc/public/userlist">User List</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" onclick="callAjax()" href="#">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/rayou18,%20kalau17,%20jlaur13/mvc/public/Home/signup">Sign Up</a>
            </li>
        </ul>
    </div>
</nav>


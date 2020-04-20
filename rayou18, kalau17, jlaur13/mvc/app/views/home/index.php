<!doctype html>
<html lang="en">
<head>

    <?php include '../app/views/partials/header.php'?>
    <link rel="stylesheet" href="/rayou18,%20kalau17,%20jlaur13/mvc/public/styles/background.css">
    <link rel="stylesheet" href="/rayou18,%20kalau17,%20jlaur13/mvc/public/styles/homepage.css">
    <title>NetJohnPany</title>

</head>
<body>
<?php include '../app/views/partials/menu.php'; ?>
<div class="container" >
    <div class="jumbotron" >
        <h1 class="display-4">Welcome to our website</h1>
        <p class="lead">Hello there<?php if($viewbag['username'] != null)echo ', ' . $viewbag['username']?></p>
        <hr class="my-4">
        <p>Go to the image feed</p>

            <a class="btn btn-primary btn-md" href="#" role="button">image feed</a>

    </div>

</div>




Hello there, <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){echo $viewbag['username'];}  ?>

<?php if($viewbag['restricted'])
{
    echo "<br>";
    echo "<img src='/rayou18, kalau17, jlaur13/mvc/public/Resources/classified.png' class=\"img-fluid\" alt='classified' />";
    echo "<br>";
    echo "You tried to access a classified page.";
}
?>


<div id="ajaxHolder">
</div>


<?php include '../app/views/partials/foot.php'; ?>
</body>
</html>

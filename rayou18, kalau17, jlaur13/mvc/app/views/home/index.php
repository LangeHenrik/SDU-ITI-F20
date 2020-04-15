<!doctype html>
<html lang="en">
<head>
    <?php include '../app/views/partials/header.php'?>
    <title>NetJohnPany</title>
</head>
<body>
<?php include '../app/views/partials/menu.php'; ?>


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




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
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




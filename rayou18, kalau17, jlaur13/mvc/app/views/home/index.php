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
    <link rel="stylesheet" href="/rayou18,%20kalau17,%20jlaur13/mvc/public/styles/background.css">
    <link rel="stylesheet" href="/rayou18,%20kalau17,%20jlaur13/mvc/public/styles/homepage.css">
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





<div id="ajaxHolder">

</div>


<?php include '../app/views/partials/foot.php'; ?>
</body>
</html>




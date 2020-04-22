<!DOCTYPE html>
<html>
	<head>
        <title>Frontpage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/style.css">
	</head>

	<body>	

    <nav>
        <div class="topnav" id="myTopnav">
            <a href="./front" class="active">Frontpage</a>
            <a href="./registration">Registration</a>
            <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {?>
            <a href="upload.php">Upload</a>
            <a href="image_feed.php">Image feed</a>
            <a href="userlist.php">User list</a>
            <?php }?>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>	
    </nav>




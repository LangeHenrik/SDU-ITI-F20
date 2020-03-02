<?php
session_start();
if (session_status() == PHP_SESSION_NONE){

header("Location: ./homepage.php");
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Photo Blog</title>
	<link rel="stylesheet" type="text/css" href="../styles/imagefeed_style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../styles/shared.css">
</head>
<body>
<div class="navbar">
	<ul>
		<li><a class="logo" href="homepage.php"><i class="fas fa-rocket"></i></a></li>
		<li><a href="homepage.php">Home Page</a></li>
		<li><a class="active" href="imagefeed.php">Image Feed</a></li>
		<li><a href="registrationpage.php">Registration Page</a></li>
		<li><a href="userlistpage.php">User List</a></li>
		<li><a href="uploadimagepage.php">Upload Image <i class="fas fa-upload"></i></a></li>
		<li><a class="cred_btns" id="logout_btn"type="button" href="../backend/logout.php" name="logout_btn">Logout</a></li>
	</ul>
</div>
<div class="picwrapper">
	<div class="picture">
		<h2>Picture 1</h2>
		<a href="http://c1.staticflickr.com/9/8450/8026519634_f33f3724ea_b.jpg" target = "_blank">
			<img class="image" src= "http://c1.staticflickr.com/9/8450/8026519634_f33f3724ea_b.jpg" alt="TitleOfPicture">
		</a>
		<div class="description">Picture Description</div>
	</div>
	<div class="picture">
		<h2>Picture 2</h2>
		<a href="http://c2.staticflickr.com/8/7218/7209301894_c99d3a33c2_h.jpg" target = "_blank">
			<img src= "http://c2.staticflickr.com/8/7218/7209301894_c99d3a33c2_h.jpg" alt = "TitleOfPicture">
		</a>
		<div class="description">Desc</div>
	</div>
	<div class="picture">
		<h2>Picture 3</h2>
		<a href="http://c2.staticflickr.com/8/7231/6947093326_df216540ff_b.jpg" target = "_blank">
			<img src= "http://c2.staticflickr.com/8/7231/6947093326_df216540ff_b.jpg" alt = "TitleOfPicture">
		</a>
		<div class="description">Desc</div>
	</div>

	<!-- Giuseppe Milo -->
	<img src= "http://c1.staticflickr.com/9/8788/17367410309_78abb9e5b6_b.jpg">
	<img src= "http://c2.staticflickr.com/6/5814/20700286354_762c19bd3b_b.jpg">
	<img src= "http://c2.staticflickr.com/6/5647/21137202535_404bf25729_b.jpg">

	<!-- GörlitzPhotography -->
	<img src= "http://c2.staticflickr.com/6/5588/14991687545_5c8e1a2e86_b.jpg">
	<img src= "http://c2.staticflickr.com/4/3888/14878097108_5997041006_b.jpg">
	<img src= "http://c2.staticflickr.com/8/7579/15482110477_0b0e9e5421_b.jpg">

	<!-- All Photos Licensed Under Creative Commons 2.0 -->
	<!-- https://creativecommons.org/licenses/by/2.0/legalcode  -->
</div>
</body>
</html>

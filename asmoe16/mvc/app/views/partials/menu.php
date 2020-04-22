<html>
  <head>
	<!-- Bootstrap -->
	<link rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
		crossorigin="anonymous">

  <script src="../js/js.js"></script>
  </head>
  <body>

<!--
<div style="background-color: lightblue;">Menu partial view</div>
-->


<!-- Menu links -->
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
	<ul class="navbar-nav">
		<?php
			function fpage($vis_name,$page) {
				echo "<li class='nav-item'>
					<a class='nav-link' href=/asmoe16/mvc/public/$page>$vis_name</a>
					</li>";
			}
			fpage("Home","home/index");
			fpage("Images","image/index");
			if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
				fpage("log out","user/logout");
			} else {
				fpage("Register","user/registration");
				fpage("Log in","user/loginpage");
			}
		?>
	</ul>
</nav>

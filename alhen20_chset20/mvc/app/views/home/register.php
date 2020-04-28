<html>
<head>
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>

<body>
	<div class="navbar">
		<nav>
			<a href="/alhen20_chset20/mvc/public/home/login">Login</a>
			<a href="/alhen20_chset20/mvc/public/home/register" class="active">Register</a>
		</nav>
	</div>

	<div class="container">
		<div class="content">
			<div class="mainform">
				<p> <?php echo $viewbag['res']; ?> </p>
				<form onsubmit="return validateReg()" action="/alhen20_chset20/mvc/public/home/register" method="POST" >
					<label for="email" >Email</label>
					<br>
					<input type="text" name="email" id="email" onchange="checkEmailReg()" />
					<br>
					<label for="username" >Username</label>
					<br>
					<input type="text" name="username" id="username" onchange="checkUnameReg()" />
					<br>
					<label for="password">Password</label>
					<br>
					<input type="password" name="password" id="password" onchange="checkPassReg()" />
					<br>
					<input type="submit" name="submit" id="submit" value="Register"/>
				</form>
				<div id="error"></div>
			</div>
		</div>
	</div>
	<script src="../js/script.js"></script>
</body>
</html>

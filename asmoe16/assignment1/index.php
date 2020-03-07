<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
	$_SESSION['logged_in']=false;
}
?>

<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<title>Aflevering 1</title>
		<link rel="stylesheet" href="style.css" type="text/css" media="all">
	</head>
	<body>
		<div class="header">
			<h1>Portfolio 1</h1>
		</div>
		<nav class="menu">
			<ul>
				<?php function fpage($vis_name,$page) {
					echo "<li> <a href=index.php?page=$page>$vis_name</a></li>";
				}
				fpage("Frontpage","frontpage");
				fpage("Registration page","registration");
				fpage("User list","userlist");
				fpage("Image feed","imagefeed");
				fpage("Upload page","upload");
				fpage("Sign-out","logout");
				?>
			</ul>
		</nav>

		<div class="wrapper">
			<div class="content">
				<?php
					switch ($_GET['page']) {
						
						case 'registration':
							include 'registrationpage.php';
							break;

						case 'upload':
							include 'uploadpage.php';
							break;

						case 'imagefeed':
							include 'imagefeedpage.php';
							break;

						case 'userlist':
							include 'userlistpage.php';
							break;

						case 'logout':
							include 'logout.php';
							break;
						
						default:
							include 'frontpage.php';
							break;
					}
				?>
			</div>
		</div>
		<script src="javascript.js" charset="utf-8"></script>
	</body>
</html>


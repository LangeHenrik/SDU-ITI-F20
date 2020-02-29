<!DOCTYPE html>
<?php
function is_session_started()
{
            return session_id() === '' ? FALSE : TRUE;
}
if (!is_session_started()) {
	session_start();
} ?>

<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<title>Lektion2</title>
		<link rel="stylesheet" href="style.css" type="text/css" media="all">
	</head>
	<body>
		<div class="header">
			<h1>TEXT</h1>
		</div>
		<div>
		<?php
			if($_SESSION["logged_in"]) {
				echo "Username : " . $_SESSION['username'];
				echo "User_id : " . $_SESSION['user_id'];
			}
		?>
		</div>

		<nav class="menu">
			<ul>
				<?php function fpage($vis_name,$page) {
					echo "<li> <a href=index.php?page=$page>$vis_name</a></li>";
				}
				fpage("Sign-up","registration");
				fpage("Users","userlist");
				fpage("Image Feed","imagefeed");
				fpage("Upload Image","upload");
				?>
				<li> <a href="logout.php">Sign-out</a></li>
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
						
						default:
							include 'frontpage.php';
							break;
					}
				echo "<br></br>";
				var_dump($_SESSION);
				echo "<br></br>";
				echo "Session status:" . session_status();
				?>
			</div>
		</div>

	</body>
</html>


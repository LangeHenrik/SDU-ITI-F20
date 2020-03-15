<!-- header -->
<?php include "../app/views/partials/header.php"; ?>

<body>

	<!-- navigation bar -->
	<?php include "../app/views/partials/nav.php"; ?>

	<!-- content-->
	<section id="content">

		<div id="entry-container">
		<div id="entry-box">

		<div class="entry-form-select">
			<a data-state="<?=$data["form"] == "login" ? "selected" : ""?>" href="<?=DIR_PUBLIC?>/users/login">Login</a>
			<a data-state="<?=$data["form"] == "register" ? "selected" : ""?>"href="<?=DIR_PUBLIC?>/users/register">Register</a>
		</div>

		<? if (isset($data["error"])): ?>
		<div id="entry-error"><?=$data["error"]?></div>
		<? endif; ?>

		<?php require "form_" . $data["form"] . ".php"; ?>

		<button type="submit" form="<?=$data["form"]?>">Submit</button>

		</div>
		</div>

	</section>

</body>

<!-- footer -->
<?php include "../app/views/partials/footer.php"; ?>
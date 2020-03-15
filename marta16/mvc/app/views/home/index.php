<!-- header -->
<?php include "../app/views/partials/header.php"; ?>

<body>

	<!-- navigation bar -->
	<?php include "../app/views/partials/nav.php"; ?>

	<!-- content-->
	<section id="content">
		<p>Hello, <?= (isset($data["user"])) ? $data["user"]->name : "stranger"; ?>!</p>
	</section>

</body>

<!-- footer -->
<?php include "../app/views/partials/footer.php"; ?>
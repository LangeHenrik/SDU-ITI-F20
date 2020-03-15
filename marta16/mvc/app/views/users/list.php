<!-- header -->
<?php include "../app/views/partials/header.php"; ?>

<body>

	<!-- navigation bar -->
	<?php include "../app/views/partials/nav.php"; ?>

	<!-- content-->
	<section id="content">

		<?php foreach ($this->friends as $friend): ?>
			<li><?=$friend?></li>
		<?php endforeach; ?>

	</section>

</body>

<!-- footer -->
<?php include "../app/views/partials/footer.php"; ?>
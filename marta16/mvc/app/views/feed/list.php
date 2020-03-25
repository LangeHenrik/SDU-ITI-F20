<!-- header -->
<?php include "../app/views/partials/header.php"; ?>

<body>

	<!-- navigation bar -->
	<?php include "../app/views/partials/nav.php"; ?>

	<!-- content-->
	<section id="content">

		<div class="feed-container">

		<?php foreach ($data["posts"] as $post): ?>

			<div class="feed-post">
				<img class="feed-post-img" src="<?=$post->img?>"/>
				<div class="feed-post-body">
					<p class="feed-post-title"><?=$post->title?></p>
					<p class="feed-post-username"><?="@" . $post->username?></p>
					<p class="feed-post-description"><?=$post->description?></p>
				</div>
			</div>

		<?php endforeach; ?>

		</div>

	</section>

</body>

<!-- footer -->
<?php include "../app/views/partials/footer.php"; ?>
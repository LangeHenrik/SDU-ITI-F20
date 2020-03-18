<!-- header -->
<?php include "../app/views/partials/header.php"; ?>

<body>

	<!-- navigation bar -->
	<?php include "../app/views/partials/nav.php"; ?>

	<!-- content-->
	<section id="content">

		<table class="table-userdata">
		<tr><th>Id</th><th>Username</th><th>Name</th><th>Email</th></tr>

		<?php foreach ($data["users"] as $user): ?>
			<tr>
				<td><?=$user->id ?? "N/A"?></td>
				<td><?=$user->username ?? "N/A"?></td>
				<td><?=$user->name ?? "N/A"?></td>
				<td><?=$user->email ?? "N/A"?></td>
			</tr>
		<?php endforeach; ?>
			
		</table>

	</section>

</body>

<!-- footer -->
<?php include "../app/views/partials/footer.php"; ?>
<nav>

	<a data-state="<?=get_class($this) == "HomeController" ? "selected" : ""?>"  href="<?=DIR_PUBLIC?>/home">Home</a>

	<? if (self::is_logged_in()): ?>

		<a data-state="<?= self::url_path_has("/users/list") ? "selected" : "" ?>"href="<?=DIR_PUBLIC?>/users/list">Users</a>
		<a href="<?=DIR_PUBLIC?>/users/logout">Logout</a>

	<? else: ?>

		<a data-state="<?=get_class($this) == "UsersController" ? "selected" : ""?>" href="<?=DIR_PUBLIC?>/users/login">Login / Register</a>

	<? endif; ?>
	
</nav>
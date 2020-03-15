<nav>
	<a data-state="<?=get_class($this) == "HomeController" ? "selected" : ""?>"  href="<?=DIR_PUBLIC?>/home">Home</a>

	<? if (self::is_SESSION_LOGGED_IN()): ?>
		<a href="<?=DIR_PUBLIC?>/users/logout">Logout</a>
	<? else: ?>
		<a data-state="<?=get_class($this) == "UsersController" ? "selected" : ""?>" href="<?=DIR_PUBLIC?>/users/login">Login / Register</a>
	<? endif; ?>
</nav>
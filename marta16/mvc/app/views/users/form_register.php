<form id="register" method="POST">

	<label for="name">Full name*</label>
	<input type="text" placeholder="Full name" name="name" pattern="^\w+(?:(?:,\s\w+)+|(?:\s\w+)+)$" required
	title="at least 2 words separated by a whitespace">

	<label for="email">Email*</label for="email">
	<input type="email" placeholder="E-mail address" name="email" required>

	<label for="email">Phone</label for="email">
	<input type="tel" placeholder="Phone number" name="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">

	<label for="username">Username*</label>
	<input type="text" placeholder="Username" name="username" pattern="[a-zA-Z]+" required
	title="only [a-Z] characters">

	<label for="password">Password*</label for="password">
	<input type="password" placeholder="Enter password" name="password"
	pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(.{8,})" required
	title="be of 8+ length and contain at least one of each: a lowercase character, an uppercase character and a digit">

</form>
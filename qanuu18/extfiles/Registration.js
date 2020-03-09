console.log('javascript is running');

function checkallforms() {
	checkusername();
	checkpassword();
	return false;
}

//Username
let usernameRegEx = new RegExp(/^[a-z|A-Z|0-9]{4,13}$/);
let usernameInput = document.getElementById("usernameInput");
let usernameInfo = document.getElementById("usernameInfo");
usernameInput.addEventListener('keyup',checkusername);

function checkusername() {

	if (usernameRegEx.test(usernameInput.value)) {
		console.log('Valid Username entered');
		usernameInput.style.borderColor = "green";
		usernameInfo.innerText = "";
		return true;
	} else {
		console.log('Invalid Username entered');
		usernameInput.style.borderColor = "red";
		usernameInfo.innerText = "Username Invalid Must be 4-13 letters.";
	}
}


//Password

let passwordRegEx = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,100}$/);
let passwordInput = document.getElementById("passwordInput");
let passwordInfo = document.getElementById("passwordInfo");
passwordInput.addEventListener('keyup',checkpassword);

function checkpassword() {

	if (passwordRegEx.test(passwordInput.value)) {
		console.log('Valid Password entered');
		passwordInput.style.borderColor = "green";
		passwordInfo.innerText = "";
		return true;
	} else {
		console.log('Invalid Password entered');
		passwordInput.style.borderColor = "red";
		passwordInfo.innerText = "Password must contain one upper case letter, at least one digit and must be longer than 6 characteres with no spaces.";
	}
}
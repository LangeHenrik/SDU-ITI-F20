console.log("My Script");

console.log('javascript is running');

let usernameIsvalid = false;
let passwordIsvalid = false;
var button = document.getElementById("submit");
	button.disabled = true;


function checkallforms() {
	checkusername();
	checkpassword();
	return false;

}

//Username
let usernameRegEx = new RegExp(/^[a-z|A-Z|0-9]{4,13}$/);
let usernameInput = document.getElementById("username");
let usernameInfo = document.getElementById("usernameInfo");


function checkusername() {

	if (usernameRegEx.test(usernameInput.value)) {
		console.log('Valid Username entered');
		usernameInput.style.borderColor = "green";
		usernameInfo.innerText='';
 usernameIsvalid = true;
	} else {
		usernameIsvalid = false;
		console.log('Invalid Username entered');
		usernameInput.style.borderColor = "red";
		usernameInfo.innerText = "Username Invalid Must be 4-13 letters.";
	}
}
//Password

let passwordRegEx = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,100}$/);
let passwordInput = document.getElementById("password");
let passwordInfo = document.getElementById("passwordInfo");


 
function checkpassword() {

	if (passwordRegEx.test(passwordInput.value)) {
		console.log('Valid Password entered');
		passwordInput.style.borderColor = "green";
		passwordInfo.innerText = "";
		passwordIsvalid = true;
		if (usernameIsvalid&&passwordIsvalid){

			button.disabled = false;
			console.log("loggin data")
	  
	  
			  }

	} else {
		passwordIsvalid = false;
		console.log('Invalid Password entered');
		passwordInput.style.borderColor = "red";
		passwordInfo.innerText = "Password must contain one upper case letter, at least one digit and must be longer than 6 characteres with no spaces.";
	}
	
}


	


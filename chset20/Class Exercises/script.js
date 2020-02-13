function checkForm(){
	var name = document.getElementById("name");
	var password = document.getElementById("password");
	var phone = document.getElementById("phone");
	var email = document.getElementById("email");
	var zip = document.getElementById("zip");
	var error = document.getElementsByClassName("errors");

	var status = 1;

	if(!(/([a-z]|[A-Z])+\s([a-z]|[A-Z])+/.test(name.value))){
		document.getElementById("errorname").innerHTML = "<p>name must be 2 words or more separated by space</p>";
		status=0;
	}

	if(password.length<8){
		document.getElementById("errorpass").innerHTML = "<p>password must be 8 or more characters</p>"
		status=0;
	}
	if(!(/.*[a-z].*/.test(password.value))){
		document.getElementById("errorpass1").innerHTML = "<p>password must contain at least 1 lowercase character</p>"
		status=0;
	}
	if(!(/.*[A-Z].*/.test(password.value))){
		document.getElementById("errorpass2").innerHTML = "<p>password must contain at least 1 uppercase character</p>"
		status=0;
	}
	if(!(/.*[0-9].*/.test(password.value))){
		document.getElementById("errorpass3").innerHTML = "<p>password must contain at least 1 number</p>"
		status=0;
	}

	if(!(/^[+]/.test(phone.value))){
		document.getElementById("errorphone1").innerHTML = "<p>phone number must start with +</p>"
		status=0;
	}
	if(!(/[0-9]{8,30}/.test(phone.value))){
		document.getElementById("errorphone2").innerHTML = "<p>phone number must be between 8 and 30 digits</p>"
		status=0;
	}

	if(!(/\w+[.]\w+[@]\w+[.]\w+/.test(email.value))){
		document.getElementById("erroremail").innerHTML = "<p>email format is incorrect</p>"
		status=0;
	}

	if(!(/\d{4}/.test(zip.value))){
		document.getElementById("errorzip").innerHTML = "<p>zip code must be exactly 4 digits</p>"
		status=0;
	}

	if(status){
		return true;
	}
	return false;
}

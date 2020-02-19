function checkName(){
	let name = document.getElementById("name");
	if(!(/([a-z]|[A-Z])+\s([a-z]|[A-Z])+/.test(name.value))){
		document.getElementById("errorname").innerHTML = "<p>name must be 2 words or more separated by space</p>";
		return false;
	}
	document.getElementById("errorname").innerHTML = "";
	return true;
}
function checkPass(){
	let password = document.getElementById("password");
	let status = 1;
	if(password.length<8){
		document.getElementById("errorpass1").innerHTML = "<p>password must be 8 or more characters</p>";
		status=0;
	}
	if(!(/.*[a-z].*/.test(password.value))){
		document.getElementById("errorpass2").innerHTML = "<p>password must contain at least 1 lowercase character</p>";
		status=0;
	}
	if(!(/.*[A-Z].*/.test(password.value))){
		document.getElementById("errorpass3").innerHTML = "<p>password must contain at least 1 uppercase character</p>";
		status=0;
	}
	if(!(/.*[0-9].*/.test(password.value))){
		document.getElementById("errorpass4").innerHTML = "<p>password must contain at least 1 number</p>";
		status=0;
	}
	if(status){
		document.getElementById("errorpass1").innerHTML = "";
		document.getElementById("errorpass2").innerHTML = "";
		document.getElementById("errorpass3").innerHTML = "";
		document.getElementById("errorpass4").innerHTML = "";
		return true;
	}
	return false;
}

function checkPhone(){
	let phone = document.getElementById("phone");
	let status=1;
	if(!(/^[+]/.test(phone.value))){
		document.getElementById("errorphone1").innerHTML = "<p>phone number must start with +</p>";
		status=0;
	}
	if(!(/[0-9]{8,30}/.test(phone.value))){
		document.getElementById("errorphone2").innerHTML = "<p>phone number must be between 8 and 30 digits</p>";
		status=0;
	}
	if(status){
		document.getElementById("errorphone1").innerHTML = "";
		document.getElementById("errorphone2").innerHTML = "";
		return true;
	}
	return false;
}

function checkEmail(){
	let email = document.getElementById("email");
	if(!(/\w+[.]\w+[@]\w+[.]\w+/.test(email.value))){
		document.getElementById("erroremail").innerHTML = "<p>email format is incorrect</p>";
		return false;
	}
	document.getElementById("erroremail").innerHTML = "";
	return true;
}
function checkZip(){
	let zip = document.getElementById("zip");
	if(!(/\d{4}/.test(zip.value))){
		document.getElementById("errorzip").innerHTML = "<p>zip code must be exactly 4 digits</p>";
		return false;
	}
	document.getElementById("errorzip").innerHTML = "";
	return true;
}

function checkForm(){
	if(checkName()&&checkPass()&&checkPhone()&&checkEmail()&&checkZip()){
		return true;
	}
	return false;
}

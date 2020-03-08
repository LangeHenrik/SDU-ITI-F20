function checkUnameReg(){
	let username = document.getElementById('username');
	if((/([a-z]|[A-Z])+\s([a-z]|[A-Z])+/.test(username.value))){
		document.getElementById('error').innerHTML = "username must not be separated by space";
		return false;
	}
	if(!(/\w{8,}/.test(username.value))){
		document.getElementById('error').innerHTML = "username must be 8 or more characters";
		return false;
	}
	return true;
}

function checkPassReg(){
	let password = document.getElementById('password');
	if(!(/\w{8,}/.test(password.value))){
		document.getElementById('error').innerHTML = "password must be 8 or more characters";
		return false;
	}
	return true;
}

function checkEmailReg(){
	let email = document.getElementById('email');
	if(!(/\w+[@]\w+[.]\w+/.test(email.value))){
		document.getElementById('error').innerHTML = "email format is incorrect, it must be word@word.word";
		return false;
	}
	return true;
}

function validateReg(){
	if(checkEmailReg()&&checkUnameReg()&&checkPassReg()){
		return true;
	}
	return false;
}

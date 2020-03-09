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
	document.getElementById('error').innerHTML = "";
	return true;
}

function checkPassReg(){
	let password = document.getElementById('password');
	if(!(/\w{8,}/.test(password.value))){
		document.getElementById('error').innerHTML = "password must be 8 or more characters";
		return false;
	}
	document.getElementById('error').innerHTML = "";
	return true;
}

function checkEmailReg(){
	let email = document.getElementById('email');
	if(!(/\w+[@]\w+[.]\w+/.test(email.value))){
		document.getElementById('error').innerHTML = "email format is incorrect, it must be word@word.word";
		return false;
	}
	document.getElementById('error').innerHTML = "";
	return true;
}

function validateReg(){
	if(checkEmailReg()&&checkUnameReg()&&checkPassReg()){
		return true;
	}
	document.getElementById('error').innerHTML = "";
	return false;
}

function checkHeaderUp(){
	let header = document.getElementById('header');
	if(!(/\w{1,20}/.test(header.value))){
		document.getElementById('error').innerHTML = "header must be 20 or less characters";
		return false;
	}
	document.getElementById('error').innerHTML = "";
	return true;
}

function checkDescUp(){
	let description = document.getElementById('description');
	if(!(/\w{1,50}/.test(description.value))){
		document.getElementById('error').innerHTML = "header must be 50 or less characters";
		return false;
	}
	document.getElementById('error').innerHTML = "";
	return true;
}

function checkImgUp(){
	var fuData = document.getElementById('image');
	var FileUploadPath = fuData.value;

	if (FileUploadPath == ''){
		document.getElementById('error').innerHTML = "please upload an image";
		return false;
	}
	else{
		var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

		if (Extension == "jpg"||Extension == "jpeg"||Extension == "png"||Extension == "gif") {
			document.getElementById('error').innerHTML = "";
			return true;
		}
		else{
			document.getElementById('error').innerHTML = "image must have jpg, jpeg, png or gif extension";
			return false;
		}
	}
}

function validateUp(){
	if(checkHeaderUp()&&checkDescUp()&&checkImgUp()){
		return true;
	}
	return false;
}

function showResults(str){
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementById("results").innerHTML = this.responseText;
		}
	};

	xhttp.open("GET", "getSearchResults.php?qry="+str, true);
	xhttp.send();
}

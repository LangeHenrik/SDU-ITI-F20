// http://www.tutorialspark.com/javascript/JavaScript_Regular_Expression_Form_Validation.php

console.log("js working");
// http://www.regex_namer.com

function check(myform) {
	return checkname(myform.name);

	// if (myform.myphone.value == "" || myform.myphone.value == null) {
	// 	alert("Phone number is mandatory");
	// 	return false;
	// } else {
	// 	return true;
	// }
}

function checkname(name) {
	if (name.value == "" || name.value == null) {
		alert("Name is mandatory");
		return false;
	}
	var regex_name = /\w+\s\w+/g;
	if (regex_name.test(name.value) == false) {
		alert("The name must by first name and last name e.g. Tomas Eggile");
		name.focus();
		return false;
	}
	return true;
}

function checkpassword(pass) {
	if (pass.value == "" || pass.value == null) {
		alert("pass is mandatory");
		return false;
	}
	var regex_pass = /+S/g;
	if (regex_pass.test(pass.value) == false) {
		alert(
			"Have to contain 8 or more chars; \br At least one lower case char; \br At least one upper case char; \br At least one number"
		);
		pass.focus();
		return false;
	}
	return true;
}

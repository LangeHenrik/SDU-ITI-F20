//https://www.w3schools.com/xml/ajax_database.asp
function showImages() {
	let str = this.value;
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("image_content").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/asmoe16/mvc/public/api/pictures/ajax/"+str, true);
  xhttp.send();
}
try {
	document.getElementById('user-selector').addEventListener('change',showImages);
}
catch {}

function fieldCheck(reg,obj) {
	try {
			obj.addEventListener('blur',
			function(){
				if (reg.test(obj.value)) {
					obj.setAttribute('class','correct')
				} else {
					obj.setAttribute('class','false')
				}
			}
		);
	}
	catch {}
}
fieldCheck(new RegExp(/(^[A-Za-z]\w*)/),
	document.getElementById('reg_username'));
fieldCheck(new RegExp(/(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}/),
	document.getElementById('reg_password'));

function checkname() {
  var name = document.getElementById("name").value
  var nameRegex = new RegExp(/[a-zA-Z]+(([ ]+[a-zA-Z]{1,}){1,})/g);
  if (nameRegex.test(name)) {
    document.getElementById("name").style.color = '#00dd00';
  } else {
    document.getElementById("name").style.color = '#dd0000';
  }
}


function checkpassword() {
  var password = document.getElementById("name").value
  var passwordRegex = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm);
  if (passwordRegex.test(password)) {
    document.getElementById("password").style.color = '#00dd00';
  } else {
    document.getElementById("password").style.color = '#dd0000';
  }
}

function checkEmail() {
  var email = document.getElementById("email").value
  var emailRegex = new RegExp(/([a-åA-Å.]{1,})([@])([a-åA-Å.]{1,})([.])([a-åA-Å.]{1,})/g);
  if (emailRegex.test(email)) {
    document.getElementById("email").style.color = '#00dd00';
  } else {
    document.getElementById("email").style.color = '#dd0000';
  }

}



function checkphone() {
  var phone = document.getElementById("phone").value
  var phoneRegex = new RegExp(/^[+][0-9]{8,30}[^a-åA-Å]$/g);
  if (phoneRegex.test(phone)) {
    document.getElementById("phone").style.color = '#00dd00';
  } else {
    document.getElementById("phone").style.color = '#dd0000';
  }
}


function checkZip() {
  var zip = document.getElementById("zip").value
  var zipRegex = new RegExp(/(^[0-9]{4})$/g);
  if (zipRegex.test(zip)) {
    document.getElementById("zip").style.color = '#00dd00';
  } else {
    document.getElementById("zip").style.color = '#dd0000';
  }
}

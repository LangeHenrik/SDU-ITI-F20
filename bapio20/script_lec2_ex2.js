function checkform() {
  checkname();
  checkpasswordlength();
  checkPassword();
  checkPhone();
  checkZip();
}

function checkpasswordlength() {
  let password = document.getElementById("password").value;
  if(password.length < 8) {
    alert("Password must be at least 8 characters")
    return false;
  }
    else {
    return true;
  }
}

function checkPassword() {
  let password = document.getElementById("password").value;
  if ((/[A-Z]+/g.test(password))&&(/[a-z]+/g.test(password))&&(/[0-9]+/g.test(password))) {
    return true;
  } else {
    alert("Password must contain at least one lower case character, one upper case character and one number");
    return false;
  }
}

function checkname() {
  let name = document.getElementById("name");
  if (/^\w+\s\w+$/g.test(name.value)) {
    return true;
  } else {
    alert("Please enter your first AND last name");
    return false;
  }
}

function checkZip() {
  let zipcode = document.getElementById("zip").value;
  if ((zipcode.length != 4)||(/[^0-9]+/g.test(zipcode))) {
    alert("ZipCode must be exactly 4 DIGITS");
    return false;
  } else {
    return true;
  }
}

function checkPhone() {
  let phone = document.getElementById("phone").value;
  if ((/\+{1}/g.test(phone))&&(/[0-9]{8,30}/g.test(phone))) {
    return true;
  } else {
    alert("Phone number must start by \"+\" and have between 8 and 30 DIGITS")
    return false;
  }
}

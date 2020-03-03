var loggedIn;

function postLogin(form) {
  console.log(form.action);
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.addEventListener("load", loginLoad);
  xhr.addEventListener("error", loginError);
  xhr.open('POST', form.action, true);
  xhr.send(formData);
  return false;
}

function logout(page) {
  const xhr = new XMLHttpRequest();
  if(page === 'index') {
    xhr.addEventListener("load", logoutLoad);
  } else if(page === 'users' || page === 'gallery' || page === 'upload') {
    xhr.addEventListener("load", logoutRedirectLoad);
  }
  xhr.open('POST', 'logout.php', true);
  xhr.send();
  return false;
}

function logoutRedirectLoad(oEvt) {
  console.log(oEvt.target.responseText);
  const jsonObj = JSON.parse(oEvt.target.responseText);
  loggedIn = false;
  if(jsonObj.loggedOut) {
    window.location.assign("index.php");
  }
}

function logoutLoad(oEvt) {
  console.log(oEvt.target.responseText);
  const jsonObj = JSON.parse(oEvt.target.responseText);
  loggedIn = false;
  if(jsonObj.loggedOut) {
    const menu = document.querySelectorAll('.menu'); // Array
console.log(menu);
    menu.forEach(changeHidden);
    document.querySelector('#logoutDiv').classList.add('hidden');
    document.querySelector('#logoutDiv').classList.remove('shown');
    document.querySelector('#loginFormDiv').classList.remove('hidden');
    document.querySelector('#loginFormDiv').classList.add('shown');
    const response = document.querySelector('#login_response');
    removeChildren(response);
  }
}

function loginLoad(oEvt) {
console.log('login load');
console.log(oEvt);

  const jsonObj = JSON.parse(oEvt.target.responseText);

  const response = document.querySelector('#login_response');
  if('error' in jsonObj) {
    removeChildren(response);
    response.appendChild(document.createTextNode('Login failed. ' + jsonObj.error));
    response.style.backgroundColor = "#F00";
  } else {
console.log('logged in');
    changeMenu();
    removeChildren(response);
    response.appendChild(document.createTextNode('Login successfull'));
    response.style.backgroundColor = "#0F0";
    loggedIn = true;
console.log(loggedIn);
  }
}

function loginError(oEvt) {
console.log('error');
  console.log(oEvt); // Event object, inspect to find out what it contains
}

function checkLoggedIn() {
console.log("TEST");
  const xhr = new XMLHttpRequest();
  xhr.addEventListener("load", checkLoggedInLoad);
  xhr.open('POST', 'loginCheck.php', true);
  xhr.send();
  return false;
}

function checkLoggedInLoad(oEvt) {
  console.log('login check load');
console.log(oEvt);

  const jsonObj = JSON.parse(oEvt.target.responseText);
  if(jsonObj.loggedIn) {
    loggedIn = true;
    changeMenu();
  } else {
    loggedIn = false;
console.log("login false");
  }
}

function changeMenu() {
    const menu = document.querySelectorAll('.menu'); // Array
    menu.forEach(changeHidden);
    document.querySelector('#loginFormDiv').classList.add('hidden');
    document.querySelector('#loginFormDiv').classList.remove('shown');
    document.querySelector('#logoutDiv').classList.remove('hidden');
    document.querySelector('#logoutDiv').classList.add('shown');
    document.querySelector('.nav').classList.remove('hidden');
}

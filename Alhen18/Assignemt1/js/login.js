var loggedIn;

function postLogin(form) {
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
  const jsonObj = JSON.parse(oEvt.target.responseText);
  loggedIn = false;
  
  if(jsonObj.loggedOut) {
    window.location.assign("index.php");
  }
}

function logoutLoad(oEvt) {
  const jsonObj = JSON.parse(oEvt.target.responseText);
  loggedIn = false;
  
  if(jsonObj.loggedOut) {
    const menu = document.querySelectorAll('.menu'); // Array
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
  const jsonObj = JSON.parse(oEvt.target.responseText);
  const response = document.querySelector('#login_response');
  
  if('error' in jsonObj) {
    removeChildren(response);
    response.appendChild(document.createTextNode('Login failed. ' + jsonObj.error));
    response.style.backgroundColor = "#F00";
  } else {
    changeMenu();
    removeChildren(response);
    response.appendChild(document.createTextNode('Login successfull'));
    response.style.backgroundColor = "#0F0";
    loggedIn = true;
  }
}

function checkLoggedIn() {
  const xhr = new XMLHttpRequest();
  xhr.addEventListener("load", checkLoggedInLoad);
  xhr.open('POST', 'loginCheck.php', true);
  xhr.send();
  return false;
}

function checkLoggedInLoad(oEvt) {
  const jsonObj = JSON.parse(oEvt.target.responseText);
  
  if(jsonObj.loggedIn) {
    loggedIn = true;
    changeMenu();
  } else {
    loggedIn = false;
  }
}
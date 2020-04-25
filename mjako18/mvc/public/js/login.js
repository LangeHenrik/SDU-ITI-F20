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
//  if(page === 'index') {
//    xhr.addEventListener("load", logoutLoad);
//  } else if(page === 'users' || page === 'gallery' || page === 'upload') {
    xhr.addEventListener("load", logoutRedirectLoad);
//  }
  xhr.open('POST', 'home/logout', true);
  xhr.send();
  return false;
}

function logoutRedirectLoad(oEvt) {
  console.log(oEvt.target.responseText);
  const jsonObj = JSON.parse(oEvt.target.responseText);
  if(jsonObj.loggedOut) {
    window.location.href = "home";
  }
}

function logoutLoad(oEvt) {
  console.log(oEvt.target.responseText);
  const jsonObj = JSON.parse(oEvt.target.responseText);
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
    response.classList.remove('shown');
    response.classList.add('hidden');
  }
}

function loginLoad(oEvt) {
console.log('login load');
console.log(oEvt);

  const jsonObj = JSON.parse(oEvt.target.responseText);

  const response = document.querySelector('#login_response');
  if(jsonObj.Success) {
console.log('logged in');
    changeMenu();
    removeChildren(response);
    response.appendChild(document.createTextNode('Login successfull'));
    response.style.backgroundColor = "#0F0";
  } else {
    removeChildren(response);
    response.appendChild(document.createTextNode('Login failed. ' + jsonObj.error));
    response.style.backgroundColor = "#F00";
  }
  response.classList.remove('hidden');
  response.classList.add('shown');
}

function loginError(oEvt) {
console.log('error');
  console.log(oEvt); // Event object, inspect to find out what it contains
}

function changeMenu() {
    const menu = document.querySelectorAll('.menu'); // Array
    menu.forEach(changeHidden);
    document.querySelector('#loginFormDiv').classList.add('hidden');
    document.querySelector('#loginFormDiv').classList.remove('shown');
    document.querySelector('.nav').classList.remove('hidden');
}

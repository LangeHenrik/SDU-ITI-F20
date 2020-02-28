function postForm(form, eventType) {
  console.log(form.action);
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  if(eventType === 'login') {
    xhr.addEventListener("load", loginLoad);
    xhr.addEventListener("error", loginError);
  } else if(eventType === 'upload') {
    xhr.addEventListener("load", uploadLoad);
    xhr.addEventListener("error", uploadError);
  } else if(eventType === 'createAccount') {
    xhr.addEventListener("load", createLoad);
    xhr.addEventListener("error", createError);
  }
  xhr.open('POST', form.action, true);
  xhr.send(formData);
  return false;
}

function loginLoad(oEvt) {
console.log('login load');
console.log(oEvt);
  const response = document.querySelector('#login_response');
  if(true) {
    const menu = document.querySelectorAll('.menu'); // Array
    console.log(menu);
    menu.forEach(changeHidden);
    response.appendChild(document.createTextNode('Login successfull'));
    response.style.backgroundColor = "#0F0";
    document.querySelector('#loginFormDiv').classList.add('hidden');
    document.querySelector('#loginFormDiv').classList.remove('shown');
    document.querySelector('#logoutDiv').classList.remove('hidden');
    document.querySelector('#logoutDiv').classList.add('shown');
  } else {
    response.addChild("Login failed");
  }
}

function changeHidden(item) {
  if(item.classList.contains('hidden')) {
    item.classList.remove('hidden');
    item.classList.add('shown');
  } else if(item.classList.contains('shown')) {
    item.classList.add('hidden');
    item.classList.remove('shown');
  }
}

function logout() {
  const xhr = new XMLHttpRequest();
  xhr.addEventListener("load", logoutLoad);
  xhr.open('POST', 'logout.php', true);
  xhr.send();
  return false;
}

function logoutLoad(oEvt) {
  console.log(oEvt.target.responseText);
  const jsonObj = JSON.parse(oEvt.target.responseText);
  if(jsonObj.loggedOut) {
    const menu = document.querySelectorAll('.menu'); // Array
    menu.forEach(changeHidden);
    document.querySelector('#logoutDiv').classList.add('hidden');
    document.querySelector('#logoutDiv').classList.remove('shown');
    document.querySelector('#loginFormDiv').classList.remove('hidden');
    document.querySelector('#loginFormDiv').classList.add('shown');
    const response = document.querySelector('#login_response');
    while(response.firstChild) {
      response.removeChild(response.lastChild);
    }
  }
}

function loginError(oEvt) {
console.log('error');
  console.log(oEvt); // Event object, inspect to find out what it contains
}

function uploadLoad() {

}

function uploadError() {

}

function CreateLoad() {

}

function createError() {

}

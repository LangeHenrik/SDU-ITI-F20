function postRegister(form) {
  console.log(form.action);
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();

  xhr.addEventListener("load", createLoad);
  xhr.addEventListener("error", createError);

  xhr.open('POST', form.action, true);
  xhr.send(formData);
  return false;
}

function createLoad(oEvt) {
  console.log('register load');
console.log(oEvt);

  const jsonObj = JSON.parse(oEvt.target.responseText);

  const response = document.querySelector('#register_response');
  if('error' in jsonObj) {
    removeChildren(response);
    response.appendChild(document.createTextNode('Register account failed. ' + jsonObj.error));
    response.style.backgroundColor = "#F00";
  } else {
    removeChildren(response);
    response.appendChild(document.createTextNode('Register account succeeded'));
    response.style.backgroundColor = "#0F0";
  }
}

function createError(oEvt) {

}

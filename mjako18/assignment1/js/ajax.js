function postForm(form, eventType) {
  console.log(form.action);
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  if(eventType === 'login') {
    xhr.addEventListener("load", loginLoad);
    xhr.addEventListener("error", loginError);
  } else if(eventType === 'upload') {
    validateImage(form, 'submit');
    xhr.addEventListener("load", uploadLoad);
    xhr.addEventListener("error", uploadError);
    xhr.upload.addEventListener("progress", showUploadProgress);
  } else if(eventType === 'register') {
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

  const jsonObj = JSON.parse(oEvt.target.responseText);

  const response = document.querySelector('#login_response');
  if('error' in jsonObj) {
    removeChildren(response);
    response.appendChild(document.createTextNode('Login failed. ' + jsonObj.error));
    response.style.backgroundColor = "#F00";
  } else {
    const menu = document.querySelectorAll('.menu'); // Array
    console.log(menu);
    menu.forEach(changeHidden);
    removeChildren(response);
    response.appendChild(document.createTextNode('Login successfull'));
    response.style.backgroundColor = "#0F0";
    document.querySelector('#loginFormDiv').classList.add('hidden');
    document.querySelector('#loginFormDiv').classList.remove('shown');
    document.querySelector('#logoutDiv').classList.remove('hidden');
    document.querySelector('#logoutDiv').classList.add('shown');
  }
}

function loginError(oEvt) {
console.log('error');
  console.log(oEvt); // Event object, inspect to find out what it contains
}

function removeChildren(element) {
  while(element.firstChild) {
    element.removeChild(element.lastChild);
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
  if(jsonObj.loggedOut) {
    window.location.assign("index.php");
  }
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
    removeChildren(response);
  }
}

function validateImage(form, evtType) {
  console.log('validate');
  console.log(form);
  const response = document.querySelector('#upload_response');
  if(form["image"].files.length > 0) {
    var fileObj = form["image"].files[0];
    var maxFileSize = 2097152; //~2MB
    var rFilter = /^(image\/bmp|image\/gif|image\/jpeg|image\/png|image\/tiff)$/i;
    if (! rFilter.test(fileObj.type)) {
      //show error - wrong file type
      removeChildren(response);
      response.appendChild(document.createTextNode('Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, tiff'));
      response.style.backgroundColor = "#F00";
      return;
    }
    if (fileObj.size > maxFileSize) {
      //show error - image to big
      removeChildren(response);
      response.appendChild(document.createTextNode('File is to big. File size must be 2MB or less.'));
      response.style.backgroundColor = "#F00";
      return;
    }
    const fileInfo = document.querySelector('#fileInfo');
    if(evtType !== 'submit') {
      removeChildren(fileInfo);
      var p = document.createElement("p");
      p.appendChild(document.createTextNode('File name: ' + fileObj.name));
      fileInfo.appendChild(p);
      p = document.createElement("p");
      p.appendChild(document.createTextNode('File type: ' + fileObj.type));
      fileInfo.appendChild(p);
      p = document.createElement("p");
      p.appendChild(document.createTextNode('File size: ' + calcFileSize(fileObj.size)));
      fileInfo.appendChild(p);
      var fileRead = new FileReader();
      fileRead.addEventListener('load', fileLoad, false);
      fileRead.readAsDataURL(fileObj);
    }
  } else {
    removeChildren(response);
    response.appendChild(document.createTextNode('Please choose a file to upload.'));
    response.style.backgroundColor = "#F00";
    return;
  }
}

function calcFileSize(bytes) {
  var sizes = ['B','KB','MB'];
  if(bytes == 0) return "n/a";
  var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
  return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
}

function fileLoad(oEvt) {
  console.log('file load');
  console.log(oEvt);
  const preview = document.querySelector('#preview');
  preview.src = oEvt.target.result;

  const fileInfo = document.querySelector('#fileInfo');
  const p = document.createElement("p");
  p.appendChild(document.createTextNode('Dimensions: ' + preview.naturalWidth + 'x' + preview.naturalHeight));
  fileInfo.appendChild(p);
  fileInfo.style.display='block';
}


function uploadLoad(oEvt) {
  console.log('upload load');
console.log(oEvt);
  const jsonObj = JSON.parse(oEvt.target.responseText);
  const response = document.querySelector('#upload_response');
  if('error' in jsonObj) {
    removeChildren(response);
    response.appendChild(document.createTextNode(jsonObj.error));
    response.style.backgroundColor = "#F00";
  } else {
    removeChildren(response);
    response.appendChild(document.createTextNode(jsonObj.success));
    response.style.backgroundColor = "#0F0";
  }
}

function showUploadProgress(oEvt) {
  var progressBar = document.querySelector("#fileUploadProgress");
  if (oEvt.lengthComputable) {
    progressBar.value = (oEvt.loaded / oEvt.total) * 100;
    progressBar.textContent = progressBar.value; // Fallback for unsupported browsers.
  }
}

function uploadError() {

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

function getUserList() {
  const xhr = new XMLHttpRequest();
  xhr.addEventListener("load", userListLoad);
  xhr.open('POST', 'userlist.php', true);
  xhr.send();
  return false;
}

function userListLoad(oEvt) {
  console.log('userlist load');
console.log(oEvt.target)
  const jsonObj = JSON.parse(oEvt.target.responseText);
  console.log(jsonObj);
  const insert = document.querySelector('#userlist');

  var table = document.createElement('table');
  var thead = table.createTHead();
  var thRow = thead.insertRow(0);
  var thCell = thRow.insertCell(0);
  thCell.appendChild(document.createTextNode('ID'));
  thCell = thRow.insertCell(1);
  thCell.appendChild(document.createTextNode('Username'));

  const tbody = table.createTBody();
  var tbRow;
  var tbCell;

  for(var key in jsonObj) {
    tbRow = tbody.insertRow(key);
    var i = 0;
    for(var k in jsonObj[key]) {
      tbCell = tbRow.insertCell(i);
      tbCell.appendChild(document.createTextNode(jsonObj[key][k]));
      i++;
    }
  }
  insert.appendChild(table);
}

function getImages() {
  const xhr = new XMLHttpRequest();
  xhr.addEventListener("load", imageListLoad);
  xhr.open('POST', 'image_list.php', true);
  xhr.send();
  return false;
}

function imageListLoad(oEvt) {
  console.log('imagelist load');
console.log(oEvt.target)
  const jsonObj = JSON.parse(oEvt.target.responseText);
  console.log(jsonObj);

  const insert = document.querySelector('#gallery');  
  var div;
  var h3;
  var p;
  var img;

  for(var row in jsonObj) {
    div = document.createElement('div');
    div.classList.add('gallery_left');
    h3 = document.createElement('h3');
    p = document.createElement('p');
    img = document.createElement('img');
    img.classList.add('horisontal-gallery');
    for(var key in jsonObj[row]) {
      if(key === 'image_name') {
        img.src = jsonObj[row][key];
      }
      if(key === 'caption') {
        h3.appendChild(document.createTextNode(jsonObj[row][key]));
      }
      if(key === 'description') {
        p.appendChild(document.createTextNode(jsonObj[row][key]));
      }
      div.appendChild(img);
      div.appendChild(h3);
      div.appendChild(p);
    }
    insert.appendChild(div);
  }
}

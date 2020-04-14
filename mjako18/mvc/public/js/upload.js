function validateImage(form, evtType) {
  console.log('validate');
  console.log(form);
  const response = document.querySelector('#upload_response');
  if(form["image"].files.length > 0) {
    var fileObj = form["image"].files[0];
    var maxFileSize = 2097152; //~2MB
    var rFilter = /^(image\/bmp|image\/gif|image\/jpeg|image\/png|image\/webp|image\/svg+xml)$/i;
    if (! rFilter.test(fileObj.type)) {
      //show error - wrong file type
      removeChildren(response);
      response.appendChild(document.createTextNode('Wrong file type. Only these types of images are allowed: bmp, gif, jpg, png, webp, svg'));
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

function postUpload(form) {
  console.log(form.action);
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();

  xhr.addEventListener("load", uploadLoad);
  xhr.addEventListener("error", uploadError);

  xhr.open('POST', form.action, true);
  xhr.send(formData);
  return false;
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

function getImages() {
  const xhr = new XMLHttpRequest();
  xhr.addEventListener("load", imageListLoad);
  xhr.open('POST', 'gallery/imagelist', true);
  xhr.send();
}

function imageListLoad(oEvt) {
  const jsonObj = JSON.parse(oEvt.target.responseText);

  const insert = document.querySelector('#gallery');

  if(oEvt.target.responseText !== "[]") {
    var div;
    var h3;
    var p;
    var img;

    for(var row in jsonObj) {
      div = document.createElement('div');
      div.classList.add('gallery_left');
      h3 = document.createElement('h3');
      dscrP = document.createElement('p');
      userP = document.createElement('p');
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
          dscrP.appendChild(document.createTextNode(jsonObj[row][key]));
        }
        if(key === 'username') {
          userP.appendChild(document.createTextNode('User: ' + jsonObj[row][key]));
        }
        div.appendChild(img);
        div.appendChild(h3);
        div.appendChild(dscrP);
        div.appendChild(userP);
      }
      insert.appendChild(div);
    }
  } else {
    removeChildren(insert);
    p = document.createElement('p');
    p.appendChild(document.createTextNode('No images have been found.'));
    insert.appendChild(p);
  }
}

loggedIn = true;

function getUserList() {
  if(loggedIn) {
    const xhr = new XMLHttpRequest();
    xhr.addEventListener("load", userListLoad);
    xhr.open('POST', 'userlist.php', true);
    xhr.send();
  } else {
    const insert = document.querySelector('#userlist');
    removeChildren(insert);
    var p = document.createElement('p');
    p.appendChild(document.createTextNode('Only registered users can see the gallery. Please log in.'));
    insert.appendChild(p);
    const menu = document.querySelectorAll('.menu'); // Array
    menu.forEach(changeHidden);
    document.querySelector('#loginFormDiv').classList.add('shown');
    document.querySelector('#loginFormDiv').classList.remove('hidden');
    document.querySelector('#logoutDiv').classList.remove('shown');
    document.querySelector('#logoutDiv').classList.add('hidden');
  }
}

function userListLoad(oEvt) {
  const jsonObj = JSON.parse(oEvt.target.responseText);
  console.log(jsonObj);
  const insert = document.querySelector('#userlist');
  if(loggedIn) {
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
  } else {
    removeChildren(insert);
    p = document.createElement('p');
    p.appendChild(document.createTextNode('Only registered users can see the gallery. Please log in.'));
    insert.appendChild(p);
  }
}

function getUserList() {
  const xhr = new XMLHttpRequest();
  xhr.addEventListener("load", userListLoad);
  xhr.open('POST', 'user/userlist', true);
  xhr.send();
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

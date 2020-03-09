function loadDoc() {

  console.log("connected");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("display").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "../userlist.php", true);
    xhttp.send();

    
  }
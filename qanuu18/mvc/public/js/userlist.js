function loadDoc() {

    console.log("connected");
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         document.getElementById("display").innerHTML = JSON.stringify(JSON.parse(this.responseText),null,2);
        }
      };
      xhttp.open("GET", "/qanuu18/mvc/public/api/users", true);
      xhttp.send();
  
      
    }
function filterResults(str, img_exists, stmt) {
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("image_square").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","./filter_search.php?filter="+str+"&image_exists="+img_exists+"&stmt="+stmt,true);
  xmlhttp.send();
}

/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
}

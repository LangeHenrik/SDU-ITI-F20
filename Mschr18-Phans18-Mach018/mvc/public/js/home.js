var picContainers = document.getElementsByClassName("picturecontainer");
for (x of picContainers) {
  x.addEventListener("mouseenter", displayCloseBtn );
  x.addEventListener("mouseleave", displayCloseBtn );
}

var timer;
function displayCloseBtn(event) {
  var deleteBtn = this.childNodes[9];
  if (event.type == "mouseenter") {
    clearTimeout(timer);
    timer = setTimeout( createHoverStyle, 1000);
    deleteBtn.style = "visibility: visible;"
  }
  else {
    clearTimeout(timer);
    deleteBtn.style = "visibility: hidden;";
    var delhov = document.getElementById("delhov"); 
    if (delhov) {
      var head = document.getElementsByTagName("head")[0];
      head.removeChild(delhov);
    }          
  }

  var crosses = deleteBtn.children;
  for (i = 0; i < crosses.length; i++) {
    if (event.type == "mouseenter")
      crosses[i].style = "transition: all 1s ease-out 0s;"
                       + "opacity: 1;"
                       + (i==0 ? "transform: translate(7px, 0) rotate(405deg);" 
                               : "transform: translate(7px, -20px) rotate(315deg);");
    else
      crosses[i].style = "opacity: 0;";
  }
}

function createHoverStyle() {
    var css = ".deleteBtn:hover{ background: radial-gradient(circle, red 10%, rgba(0, 0, 0, 0) 80%);" 
                              + "transform: scale(1.3); }";
    var style = document.createElement('style');
    style.id = "delhov";

    if (style.styleSheet) {
        style.styleSheet.cssText = css;
    } else {
        style.appendChild(document.createTextNode(css));
    }
    document.getElementsByTagName("head")[0].appendChild(style);
}

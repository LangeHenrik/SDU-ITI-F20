var picupload = document.getElementById('picupload');
var container = document.getElementById("preview");
container.overflow = scroll;

function addImg(imgFileNr, files)
{
  if (imgFileNr > 0)
  {
    var img = document.createElement("img");
    img.src = URL.createObjectURL(files[imgFileNr-1]);

    var imgText = document.createElement("p");
    imgText.innerHTML = "Name: " + files[imgFileNr-1].name;

    container.appendChild(img);
    container.appendChild(imgText);

    addImg(--imgFileNr, files);
  }
}

picupload.onchange = function()
{
  // Cleaning out children.
  while (container.children["length"] > 0) {
    container.removeChild(container.children[0]);
  }

  // Is any of the files bad?
  for (var i = 0; i < this.files["length"]; i++)
  {
    if (!this.files[i].type.match("image.*"))
    {
      alert('File type is not a supported image type');
      this.value = '';
      return;
    }
  }
  
  // Adding new images to container.
  // addImg(this.files["length"], this.files);

  for (let i = 0; i < this.files["length"]; i++) 
  {
    var img = document.createElement("img");
    // Check filesize.
    if (this.files[i]["size"]/1048576 > 2) 
      img.src = "Include/Image is too big.png";
    else
      img.src = URL.createObjectURL(this.files[i]);
      
      var imgText = document.createElement("p");
      imgText.innerHTML = "Name: " + this.files[i].name;
      
      container.appendChild(img);
      container.appendChild(imgText);
    
  } 
}

var picContainers = document.getElementsByClassName("picturecontainer");
for (x of picContainers) {
  x.addEventListener("mouseenter", displayCloseBtn );
  x.addEventListener("mouseleave", displayCloseBtn );
}

var timer;
function displayCloseBtn(event) {
  var deleteBtn = this.lastChild.previousSibling;
  if (event.type == "mouseenter") {
    clearTimeout(timer);
    timer = setTimeout( createHoverStyle, 1000);
    deleteBtn.style = "visibility: visible;"
    this.getElementsByClassName("byuser")[0].style = "padding-right: 25px; width: 215px; transition: all 1s ease-out";
  }
  else {
    clearTimeout(timer);
    deleteBtn.style = "visibility: hidden;";
    var delhov = document.getElementById("delhov"); 
    if (delhov) {
      var head = document.getElementsByTagName("head")[0];
      head.removeChild(delhov);
    }
    this.getElementsByClassName("byuser")[0].style = "padding-right: 0px; width: 240px;";                
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
    var css = ".deleteBtn:hover{ background: radial-gradient(circle, red 10%, gray 80%);" 
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

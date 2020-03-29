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

console.log("got in here");
var picContainers = document.getElementsByClassName("picturecontainer");
for (x of picContainers) {
  console.log("got in foreach");
  x.addEventListener("mouseenter", displayCloseBtn );
  x.addEventListener("mouseleave", displayCloseBtn );
}

function displayCloseBtn(event) {
  console.log(event);
  var deleteBtn = this.lastChild.previousSibling;

  if (event.type == "mouseenter") {
    deleteBtn.style = "visibility: visible;" 
                    + "opacity: 1;";
  }
  else
    deleteBtn.style = "visibility: hidden;" 
                    + "opacity: 0;";

  var crosses = deleteBtn.children;
  for (i = 0; i < crosses.length; i++) {
    if (event.type == "mouseenter")
      crosses[i].style = "transition: all 1s ease-out;"
                       + "opacity: 1;"
                       + (i==0 ? "transform: translate(7px, 0) rotate(405deg);" 
                               : "transform: translate(7px, -20px) rotate(315deg);");
    else
      crosses[i].style = "opacity: 0;";
  }
}

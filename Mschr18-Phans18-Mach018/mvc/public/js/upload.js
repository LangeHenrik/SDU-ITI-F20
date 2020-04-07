var imageSrc = document.getElementById("image-src");
  imageSrc.style.cssText = 'display: none;';
var imageNone = document.getElementById("image-none");
  imageNone.style.cssText = 'display: block;';
var imageError = document.getElementById("image-error");
  imageError.style.cssText = 'display: none;';
var imageText = document.getElementById("image-text");
  imageText.innerHTML = "";
  imageText.style.cssText = 'display: none;';

picupload.onchange = function()
{
  imageSrc.style.cssText = 'display: none;';
  imageNone.style.cssText = 'display: none;';
  imageError.style.cssText = 'display: none;';
  imageText.innerHTML = "";
  imageText.style.cssText = 'display: none;';

  if (this.files.length == 0)
  {
    console.log("0 files." );
    imageNone.style.cssText = 'display: block;';
    return;
  }
  else if (this.files.length == 1)
  {
    console.log("1 file.");

    if (this.files[0]["size"]/1048576 > 2)
    {
      console.log("File size to big.");
      imageError.style.cssText = 'display: block;';
      imageText.style.cssText = 'display: block;';
      imageText.innerHTML = "Sorry image size is to big.";
      return;
    }
    else if (!this.files[0].type.match("image.*"))
    {
      console.log("file not correct type.");
      imageError.style.cssText = 'display: block;';
      imageText.style.cssText = 'display: block;';
      imageText.innerHTML = "File type not suported!";
      return;
    }
    else
    {
      console.log("image selected.");
      imageSrc.style.cssText = 'display: block;';
      imageSrc.src = URL.createObjectURL(this.files[0]);
      return;
    }
  }
  else
  {
    console.log("Too many files sellected.")
    imageError.style.cssText = 'display: block;';
    imageText.style.cssText = 'display: block;';
    imageText.innerHTML = "You can only sellect one image!";
    return;
  }
}

var textarea = document.querySelector('textarea');

textarea.addEventListener('keydown', autosize);

function autosize(){
  var element = this;
  setTimeout(styleHeight(element),0);
}

function styleHeight(element){
  element.style.cssText = 'height:auto; padding:0';

  var newHeight = element.scrollHeight+50;
  element.style.cssText = 'height:' + newHeight + 'px;'
                        + 'resize: none;';
}

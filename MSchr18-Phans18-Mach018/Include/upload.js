var picupload = document.getElementById('picupload');

picupload.onchange = function() 
{
  var uploadedImage = document.getElementById('uploadedImage');
  var imageToLoad = this.files[0];
  if (imageToLoad.type.match("image.*")) 
  {
    uploadedImage.hidden = false;
    uploadedImage.src = URL.createObjectURL(imageToLoad);
  }
  else 
  {
    alert('File type is not a supported image type');
    this.value = '';
    uploadedImage.src = '';
    uploadedImage.hidden = true;
  }
};
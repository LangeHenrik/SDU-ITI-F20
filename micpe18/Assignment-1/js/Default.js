var rotated = false;
var sidebarOut = false;

function openSlideMenu() {
  if(!sidebarOut){
    sidebarOut = true;
    iconRotate()
    if (!window.matchMedia("(max-width: 1000px)").matches) {
      document.getElementById("menu").style.width = "250px";
      document.getElementById("content").style.marginLeft = "250px";
    } else {
      document.getElementById("menu").style.width = "500px";
      document.getElementById("content").style.marginLeft = "500px";
    }
  }else{
    sidebarOut = false;
    closeSlideMenu()
  }

}
function closeSlideMenu() {
  iconRotate()
  document.getElementById("menu").style.width = "0";
  document.getElementById("content").style.marginLeft = "0";
}

function iconRotate(){
  
  if(!rotated){
    rotated = true;
    document.getElementById("openMenu").style.transform = 'rotate(180deg)';
    document.getElementById("openMenu").style.transition = '0.7s';
  }else{
    rotated = false;
    document.getElementById("openMenu").style.transform = 'rotate(0deg)';
  }
}

  // Get the modal
  var modal = document.getElementById('formid');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = 'none';
    }
  };

  function openModal(){
    document.getElementById('formid').style.display='flex'
  }


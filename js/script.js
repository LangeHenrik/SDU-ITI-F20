function showHint(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "gethint.php?q="+str, true);
  xhttp.send();   
}
function checkFields() {

  var Tpassword = document.getElementById("password").value;
  var Tname = document.getElementById("name").value;
  var Temail = document.getElementById("email").value;
  var TphoneNumber = document.getElementById("phone").value;
  var TpostalCode = document.getElementById("zip").value;
      
  

    var nameRGEX= /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/; 
    var passwordRGEX = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    var emailRGEX = /^\S+@\S+\.[a-z|A-Z]{2,10}$/; 
    var phoneRGEX = /^\+(\d){8,25}$/;
    var postalRGEX = /^\d{4}$/;
    
    var nameResult = nameRGEX.test(Tname);
    var passwordResult = passwordRGEX.test(Tpassword);
    var emailResult = emailRGEX.test(Temail);
    var phoneResult = phoneRGEX.test(TphoneNumber);
    var postalResult = postalRGEX.test(TpostalCode);
      
   
    if (nameResult == false) 
    {
      text = "Input not valid";
    } else {
      text = "Input OK";
    }
    document.getElementById("inputName").innerHTML = text;
  
    if (passwordResult == false) 
    {
      text = "Input not valid";
    } else {
      text = "Input OK";
    }
    document.getElementById("inputPassword").innerHTML = text;


    if (emailResult == false) 
    {
      text = "Input not valid";
    } else {
      text = "Input OK";
    }
    document.getElementById("inputEmail").innerHTML = text;


    if (phoneResult == false) 
    {
      text = "Input not valid";
    } else {
      text = "Input OK";
    }
    document.getElementById("inputPhone").innerHTML = text;



    if(postalResult == false)
      {
      
        text = "Input not valid";
      } else 
      {
          text="Input OK"
      } 

      document.getElementById("inputZip").innerHTML = text;
      
      
      
      return false;
    }
  
     
      
  
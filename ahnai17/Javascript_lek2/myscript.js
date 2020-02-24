/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function checkfield() {
    if (validateName()===true& validatePass()===true & 
        validatePhone()===true& validateMail()===true& 
        validateZip()===true){
        return true; 
}
}
function validateName(){
    var name=document.myForm.Name.value;
    if( document.myForm.Name.value === "" ) {
            alert( "Please provide your name!" );
            return false;
    } else if ( /^[A-z ]+$/.test(name)===false) {
                alert("Please use only letters for name");
                return false;
    } else {
            return true;
    }
}
function validatePass(){
    var regex = new regex("((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,20})");
    if (regex.test(document.myForm.PAssword.value)===false ){
        alert("password need 1 upper case, 1 lower case, 1 number and at least 8 characters");
        return false;
    } else {
        return true;
    } 
}
function validatePhone(){
    if (document.myForm.Phone.length<9){
        alert("please enter between 8 and 30 numbers in phone field");
        return false;
    } else{
        var x = document.myForm.Phone.value;
        if (x.charAt(0)!=="+"){
            alert("Phone number should start with +");
            return false;
        } else if (x.length>31){
            alert("number is too large");
            return false;
        } else {
            return true;
        }
    }
}
function validateMail(){
    if (document.myForm.EMail.value ===""){
        alert( "Please provide your E-mail!" );
            document.myForm.Name.focus() ;
            return false;
    }else { 
         var emailID = document.myForm.EMail.value;
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         if (atpos < 1 || ( dotpos - atpos < 2 )) {
            alert("Please enter correct email ID");
            document.myForm.EMail.focus() ;
            return false;
         } else {
             return true;
        }
    } 
}
function validateZip(){
    if( document.myForm.Zip.value === "" || isNaN( document.myForm.Zip.value ) ||
            document.myForm.Zip.value.length !== 4 ) {
            alert( "Please provide a zip in the format ####." );
            document.myForm.Zip.focus() ;
            return false;
        } else {
            return true;
        } 
}

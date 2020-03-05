// our Ajax call
function SearchUser(str){
    if (str === "") {
        document.getElementById("show_user").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 1 && this.status === 200) {
                document.getElementById("show_user").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","DisplayUsers.php?q="+str,true);
        xmlhttp.send();
    }
}

// our Ajax call
function SearchUser(str){
    if (str === "") {
        document.getElementById("show_user").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 1) {
                document.getElementById("show_user").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","DisplayUsers.php?search_username="+str,true);
        xmlhttp.send();
    }
}

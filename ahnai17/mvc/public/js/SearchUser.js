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
            if (this.readyState === 1 && this.status === 200) {
                document.getElementById("show_user").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","/ahnai17/mvc/public/home/showUsers?search_userid="+str,true);
        xmlhttp.send();
    }
}

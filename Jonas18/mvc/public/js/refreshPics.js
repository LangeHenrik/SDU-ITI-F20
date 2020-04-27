
function refreshPics() {
    var xmlhttp = new XMLHttpRequest();
    var url = "/jonas18/mvc/app/services/getImages.php";

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content").innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

document.addEventListener("DOMContentLoaded", function(){
    refreshPics();
});
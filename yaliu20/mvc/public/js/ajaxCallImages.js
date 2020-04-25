function getUserImages(searchParameter) {

    var xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("imagefeed").innerHTML = this.responseText;
        };

    }
    xmlhttp.open("GET", "/yaliu20/mvc/app/services/searchImages.php?searchParameter=" + searchParameter, true);
    xmlhttp.send();
}

document.addEventListener("DOMContentLoaded", function() {
    getUserImages(document.getElementById("search").value);
});
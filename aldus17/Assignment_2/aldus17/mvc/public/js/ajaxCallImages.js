function getUserImages(searchParameter) {

    var ajax = new XMLHttpRequest();


    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("imagefeed").innerHTML = this.responseText;
        };


    }
    ajax.open("GET", "/mvc/public/user/searchImage/" + searchParameter, true);
    ajax.send();
}

document.addEventListener("DOMContentLoaded", function() {
    getUserImages(document.getElementById("search").value);
});
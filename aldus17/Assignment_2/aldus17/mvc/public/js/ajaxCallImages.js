function getUserImages(searchParameter) {

    var ajax = new XMLHttpRequest();

    ajax.open("GET", "dbconfig_and_controllers/searchImages.php?searchParameter=" + searchParameter, true);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("imagefeed").innerHTML = this.responseText;

        };
    }
}

document.addEventListener("DOMContentLoaded", function() {
    getUserImages(document.getElementById("search").value);
});
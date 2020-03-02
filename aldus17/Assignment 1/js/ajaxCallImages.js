function getUserImages(searchParameter) {

    var ajax = new XMLHttpRequest();

    ajax.open("GET", "dbconfig_and_controllers/searchImages.php?searchParameter=" + searchParameter, true);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("imagefeed").innerHTML = this.responseText;


            /*console.log(this.responseText);
            var data = JSON.parse(this.responseText);
            console.log(data);

            var html = "";

            for (var a = 0; a < data.length; a++) {
                var title = data[a].title;
                var description = data[a].description;
                var image = data[a].image;
                var username = data[a].username;
                var creationTime = data[a].creationTime;

                html += "<h1>" + title + "</h1>";
                html += "<p>" + description + "</p>";
                html += "<img src=" + image + "/>";
                html += "<p><i>" + username + " " + creationTime + "</i></p>";
            }
            document.getElementById("imagefeed").innerHTML += html;
*/
        };
    }
}

document.addEventListener("DOMContentLoaded", function() {
    getUserImages(document.getElementById("search").value);
});
/* function getUserImages(searchParameter) {

    var xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("imagefeed").innerHTML = this.responseText;
        };

    }
    xmlhttp.open("GET", "/aldus17/mvc/app/services/searchImages.php?searchParameter=" + searchParameter, true);
    xmlhttp.send();
}

document.addEventListener("DOMContentLoaded", function() {
    getUserImages(document.getElementById("search").value);
});
 */
$(document).ready(function() {
    var $this;
    var loadingText;

    getUserImages($(".search").html());
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        getUserImages('');
    }
});

$(document).ajaxSend(function(event, request, settings) {
    $('.bs-example').show();
});

$(document).ajaxComplete(function(event, request, settings) {
    $('.bs-example').hide();
});

function getUserImages(searchParameter) {
    $.ajax({
        url: "/aldus17/mvc/app/services/searchImages.php?searchParameter=" + searchParameter,
        type: "GET",
        async: true,
        searchParameter: searchParameter,
        success: function(data) {

            $(".imagefeed").html(data);
        },
        error: function(response) {

        }
    });

}
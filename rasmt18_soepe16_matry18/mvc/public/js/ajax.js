function getImage(){
// This is the client-side script.
    var img_id = 1;
// Initialize the HTTP request.
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/rasmt18_soepe16_matry18/mvc/public/Image/loadImages');
    var divid = document.getElementById('content');
// Track the state changes of the request.
    xhr.onreadystatechange = function () {
        var DONE = 4; // readyState 4 means the request is done.
        var OK = 200; // status 200 is a successful return.
        if (xhr.readyState === DONE) {
            if (xhr.status === OK) {
                divid.insertAdjacentHTML("beforeend", xhr.responseText);
            } else {
                console.log('Error: ' + xhr.status); // An error occurred during the request.
            }
        }
    };

// Send the request to send-ajax-data.php
    xhr.send(null);
}
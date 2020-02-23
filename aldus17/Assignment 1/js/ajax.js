var button = document.getElementById("button");
button.addEventListener("click", changeText); // NO parentheses change() IN METHOD CALLS FOR ADDLISTENER

function loadXMLDoc() {
    var xmlhttp;
    // use XMLhttpRequest object to interact with servers
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;
}

var HTTP = loadXMLDoc();

function changeText() {

    var url = "randNumGen.php";

    HTTP.onreadystatechange = function() {
        if (HTTP.readyState == 4 && HTTP.status == 200) {
            document.getElementById("message").innerHTML = HTTP.responseText;
        }
    };

    HTTP.open("GET", url, true);
    HTTP.send();

    // making more calls to the PHP file if this was not added, it would otherwise just load the page once after submit.
    // 2000 means 2 sec
    // setTimeout(changeText, 2000);

    // Interval to call the function in a specific interval when click event is pressed. 
    setInterval(changeText, 2000);
}
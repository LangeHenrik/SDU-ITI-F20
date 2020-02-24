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

function getUser() {

}
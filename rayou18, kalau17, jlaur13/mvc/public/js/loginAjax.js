function callAjax() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ajaxHolder").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/rayou18,%20kalau17,%20jlaur13/mvc/public/Home/login", true);
    xhttp.send();
}

function signUpAjax() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ajaxHolder").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/rayou18,%20kalau17,%20jlaur13/mvc/public/Home/signup", true);
    xhttp.send();
}

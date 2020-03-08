function EmailAvailable() {
    let xmlhttp = new XMLHttpRequest();
    let info = document.getElementById("email-availability");
    let input = document.getElementById("email");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            info.innerHTML = this.responseText;
            info.style.display = 'block';
            if (this.responseText.includes('available')){
                info.style.color = "green";
                input.style.borderColor = "green";
                return true;
            }
            info.style.color = "red";
            input.style.borderColor = "red";
            return false;
        }
    };
    if (RegExp(/^\S+@\S+\.[a-z|A-Z]{2,10}$/).test(input.value)){
        xmlhttp.open("GET", "EmailAvailable.php?email=" + input.value, true);
        xmlhttp.send();
    } else {
        info.style.display = 'none';
    }
}
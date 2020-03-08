function UsernameAvailable($username) {
    let xmlhttp = new XMLHttpRequest();
    let info = document.getElementById("username-availability");
    let input = document.getElementById("username");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            info.innerHTML = this.responseText;
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
    if ($username.length > 2){
        xmlhttp.open("GET", "UsernameAvailable.php?username=" + $username, true);
        xmlhttp.send();
    }
}
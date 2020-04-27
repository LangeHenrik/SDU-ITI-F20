function UsernameAvailable($username) {
    let xmlhttp = new XMLHttpRequest();
    let info = document.getElementById("username-availability");
    let input = document.getElementById("username");
    if ($username.length > 2){
        xmlhttp.open("GET", "/Assignment1/mvc/public/api/availability/username/" + $username, false);
        xmlhttp.send();
    }
    xmlhttp.onreadystatechange = function() {
        console.log("HECK");
        console.log(this.readyState);
        if (this.readyState === 4 && this.status === 200) {
            info.innerHTML = this.responseText;
            if (this.responseText.includes('available')){
                info.style.color = "green";
                //input.style.borderColor = "green";
                return true;
            }
            info.style.color = "red";
            //input.style.borderColor = "red";
            console.log("This is another error");
            return false;
        } else {
            console.log("This is an error");
            return false;
        }
    }
    return false;
}
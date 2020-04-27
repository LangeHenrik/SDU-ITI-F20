/*if (document.getElementById("register")) {
    document.getElementById("register").addEventListener("click",function () {
        document.getElementById("registerView").style.display = "block";
        document.getElementById("loginView").style.display = "none";
    })
}
function showHomeLink() {
    document.getElementById("uploadForm").style.display = "none";
    document.getElementById("imagePage").style.display = "block";
    document.getElementById("usersPage").style.display = "none";
}

function showPhotoLink ()
{
    document.getElementById("uploadForm").style.display = "block";
    document.getElementById("imagePage").style.display = "none";
    document.getElementById("usersPage").style.display = "none";

}
function showUsersLink() {
    document.getElementById("uploadForm").style.display = "none";
    document.getElementById("imagePage").style.display = "none";
    document.getElementById("usersPage").style.display = "block";
}


function checkRegister() {
    let usernameValue = document.getElementById("regUsernameId");
    let usernameRegex =/^[A-Za-zÆØÅæøå _\-\d]{3,}$/;
    let available = checkUsername(usernameValue.value);
    let valid = checkRegEx(usernameValue, usernameRegex);
    return available && valid;
}

function checkRegEx(nameTest, regExp) {
    if (RegExp(regExp).test(nameTest.value)) {
        return true;
    } else {
        return false;
    }
}



function checkUsername($username) {

    let xmlhttp = new XMLHttpRequest();
    let info = document.getElementById("usernameAvailable");
    let input = document.getElementById("regUsernameId");
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            info.innerText = this.responseText;
            if (this.responseText.includes('available')) {
                info.innerHTML = "Username available";
                return true;
            } else {
                info.innerHTML = "Username not available";
                return false;
            }
        }
    };
    if ($username.length > 2) {
        xmlhttp.open("GET", "index.php?username=" + $username, true);
        xmlhttp.send();
    }
}

function getAndCheckRegister($name, $regex){
    if (isset($_POST[$name])){
        $value = htmlentities($_POST[$name]);
        if (preg_match($regex, $value)){
            return $value;
        } else {
            return false;
        }
    }
    return false;
}*/
if (document.getElementById("register")) {
    document.getElementById("register").addEventListener("click",function () {
        document.getElementById("registerView").style.display = "block";
        document.getElementById("loginView").style.display = "none";
    })
}
function showHomeLink() {
    document.getElementById("uploadForm").style.display = "none";
    document.getElementById("imagePage").style.display = "block";
}

function showPhotoLink ()
{
    document.getElementById("uploadForm").style.display = "block";
    document.getElementById("imagePage").style.display = "none";

}
function showUsersLink() {
    document.getElementById("uploadForm").style.display = "none";
    document.getElementById("imagePage").style.display = "none";
}


function checkLogin() {

}
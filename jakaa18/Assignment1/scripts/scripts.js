if (document.getElementById("register")) {
    document.getElementById("register").addEventListener("click",function () {
        document.getElementById("registerView").style.display = "block";
        document.getElementById("loginView").style.display = "none";
    })
} else if (document.getElementById("homelink")) {
    document.getElementById("homelink").addEventListener("click", function () {
        document.getElementById("homelink").style.display = "block";
        document.getElementById("photolink").style.display = "none";
        document.getElementById("userslink").style.display = "none";
        document.getElementById("fileId").style.display = "none";
        document.getElementById("header").style.display = "none";
        document.getElementById("descriptionId").style.display = "none";
        document.getElementById("imgSubmit").style.display = "none";

    })
} else if (document.getElementById("photolink")) {
    document.getElementById("photolink").addEventListener("click", function () {
        document.getElementById("homelink").style.display = "none";
        document.getElementById("photolink").style.display = "block";
        document.getElementById("userslink").style.display = "none";
        document.getElementById("fileId").style.display = "block";
        document.getElementById("header").style.display = "block";
        document.getElementById("descriptionId").style.display = "block";
        document.getElementById("imgSubmit").style.display = "block";
    })
} else if (document.getElementById("userslink")) {
    document.getElementById("userslink").addEventListener("click", function () {
        document.getElementById("homelink").style.display = "none";
        document.getElementById("photolink").style.display = "none";
        document.getElementById("userslink").style.display = "block";
        document.getElementById("fileId").style.display = "none";
        document.getElementById("header").style.display = "none";
        document.getElementById("descriptionId").style.display = "none";
        document.getElementById("imgSubmit").style.display = "none";
    })
}


function checkLogin() {

}
document.getElementById("register").addEventListener("click",function () {
    document.getElementById("registerView").style.display = "block";
    document.getElementById("loginView").style.display = "none";
})
document.getElementById("homelink").addEventListener("click",function () {
    document.getElementById("homelink").style.display = "block";
    document.getElementById("photolink").style.display = "none";
    document.getElementById("userslink").style.display = "none";
})
document.getElementById("photolink").addEventListener("click",function () {
    document.getElementById("homelink").style.display = "none";
    document.getElementById("photolink").style.display = "block";
    document.getElementById("userslink").style.display = "none";
})
document.getElementById("userslink").addEventListener("click",function () {
    document.getElementById("homelink").style.display = "none";
    document.getElementById("photolink").style.display = "none";
    document.getElementById("userslink").style.display = "block";
})

function checkLogin() {

}
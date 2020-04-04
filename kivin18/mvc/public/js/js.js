console.log("My Script");

function q(search) {
    return document.querySelector(search);
}

if (q('#loginButton')) {
    q('#loginButton').addEventListener('click', function () {
        fetch('/kivin18/mvc/public/user/login').then(function (response) {
            return response.text();
        }).then(function (text) {
            q('#loginInfo').innerHTML = text;
        }).catch(function (error) {
            q('#loginInfo').innerHTML = 'Request failed: ' + error;
        });
    });
}

// Login
// if (document.getElementById('loginButton')) {
//     document.getElementById('loginButton').addEventListener('click', function () {
//         let xmlhttp = new XMLHttpRequest();
//         let form = new FormData(document.getElementById("loginForm"));
//         xmlhttp.onreadystatechange = function () {
//             if (this.readyState == 4 && this.status == 200) {
//                 document.getElementById("loginInfo").innerHTML = this.responseText;
//             }
//         };
//         xmlhttp.open("POST", "/kivin18/mvc/public/user/login", true);
//         xmlhttp.send(form);
//     });
// }
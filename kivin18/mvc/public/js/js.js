console.log("My Script");

function q(search) {
    return document.querySelector(search);
}

// if (q('button#loginButton')) {
//     q('button#loginButton').addEventListener('click', function () {
//         let form = new FormData(q('form#loginForm'));
//         fetch('/kivin18/mvc/public/user/login', {
//             method: 'POST',
//             body: form
//         }).then(function (response) {
//             return response.text();
//         }).then(function (text) {
//             q('small#loginInfo').innerHTML = text;
//         }).catch(function (error) {
//             q('small#loginInfo').innerHTML = 'Request failed: ' + error;
//         });
//     });
// }

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
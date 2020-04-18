console.log("My Script");

function q(search) {
    return document.querySelector(search);
}

if(q('.fileInput')) {
    q('.fileInput').addEventListener('change', function () {
        let fileName = q('.fileInput').value.split('\\').pop();
        q('#uploadInfo').innerHTML = fileName;
    });
}

// Check username availability
function checkUsername() {
    let username = q('input#username').value;
    fetch('/kivin18/mvc/public/api/checkusername/' + username, {
        method: 'GET',
    }).then(function (response) {
        return response.text();
    }).then(function (text) {
        q('small#usernameInfo').innerHTML = text;
    }).catch(function (error) {
        q('small#usernameInfo').innerHTML = 'Request failed: ' + error;
    });
}

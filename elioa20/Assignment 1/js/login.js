const loginForm = {
    username: document.getElementById('username'),
    password: document.getElementById('password'),
    messages: document.getElementById('login-messages'),
    login: document.getElementById('login'),
    register: document.getElementById('register')
};

loginForm.login.addEventListener('click', () => {
    var request = new XMLHttpRequest();

    var requestData = `username=${loginForm.username.value}&password=${loginForm.password.value}`;

    request.onload = () => {
        let responseObject = null;

        try{
            responseObject = JSON.parse(request.responseText);
        }
        catch (e) {
            console.error('Could not parse JSON');
        }

        if(responseObject){
            handleLoginResponse(responseObject);
        }
    };

    request.open("post", "../php/login.php", true);
    request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    request.send(requestData);
});


function handleLoginResponse(responseObject){
    if(responseObject.ok) {
        location.href = '../views/dashboard.html';
    }else{
        //In case they were errors before. Need to clear the list.
        while(loginForm.messages.firstChild){
            loginForm.messages.removeChild(loginForm.messages.firstChild);
        }

        responseObject.messages.forEach((message) => {
            var li = document.createElement('li');
            li.textContent = message;
            loginForm.messages.appendChild(li);
        });

        loginForm.messages.style.display = 'block';
    }

}
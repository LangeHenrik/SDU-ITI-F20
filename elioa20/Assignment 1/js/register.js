const registerForm = {
    username: document.getElementById('username'),
    password: document.getElementById('password'),
    password2: document.getElementById('password2'),
    messages: document.getElementById('register-messages'),
    register: document.getElementById('register')
};


registerForm.register.addEventListener('click', () => {
    var request = new XMLHttpRequest();

    var requestData = `username=${registerForm.username.value}&password=${registerForm.password.value}&password2=${registerForm.password2.value}`;

    request.onload = () => {
        let responseObject = null;

        try{
            responseObject = JSON.parse(request.responseText);
        }
        catch (e) {
            console.error('Could not parse JSON');
        }

        if(responseObject){
            handleRegisterResponse(responseObject);
        }
    };

    request.open("post", "../php/register.php", true);
    request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    request.send(requestData);
});


function handleRegisterResponse(responseObject){
    if(responseObject.ok) {
        location.href = '../views/dashboard.html';
    }else{
        //In case they were errors before. Need to clear the list.
        while(registerForm.messages.firstChild){
            registerForm.messages.removeChild(registerForm.messages.firstChild);
        }

        responseObject.messages.forEach((message) => {
            var li = document.createElement('li');
            li.textContent = message;
            registerForm.messages.appendChild(li);
        });

        registerForm.messages.style.display = 'block';
    }

}
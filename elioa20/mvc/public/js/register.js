const registerForm = {
    username: document.getElementById('username'),
    password: document.getElementById('password'),
    password2: document.getElementById('password2'),
    messages: document.getElementById('register-messages'),
    register: document.getElementById('register')
};
//JQuery AJAX call to register
$("#register").click(function () {
    var request = $.ajax({
        type: "POST",
        url: "/elioa20/mvc/public/api/register",
        data: {
            username:$("#username").val(),
            password: $("#password").val(),
            password2: $("#password2").val()
        },
        dataType: "json"
    });
    request.done(function( response ) {
        handleRegisterResponse(response);
    });
    request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
    });
});

function handleRegisterResponse(responseObject){
    if(responseObject.ok) {
        location.href = '/elioa20/mvc/public/index';
    }else{
        //In case they were errors before. Need to clear the list
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
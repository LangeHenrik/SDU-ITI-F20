const loginForm = {
    username: document.getElementById('username'),
    password: document.getElementById('password'),
    messages: document.getElementById('login-messages'),
    login: document.getElementById('login'),
    register: document.getElementById('register')
};

//JQuery AJAX call to login
$("#login").click(function () {
    var request = $.ajax({
        type: "POST",
        url: "/elioa20/mvc/public/home/login",
        data: {
            username:$("#username").val(),
            password: $("#password").val(),
        },
        dataType: "json"
    });
    request.done(function( response ) {
        handleLoginResponse(response);
    });
    request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
    });
});

function handleLoginResponse(responseObject){
    if(responseObject.ok) {
      location.href = '/elioa20/mvc/public/home/odinsblog';
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
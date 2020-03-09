<?php

//Require the header page.
require 'header.php';
 
?>

<div class="main" align="center">
<?php
        //Check whether user is logged in or not.
        //If user is logged in, show welcoming message.
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo '<p>welcome "'."$username".'" have fun exploring our page</p>';

        }
        else {
            //If user is not logged in, show the login form.
            echo '<div class="wrapper" id="loginform">
            <h2> Log-in form</h2>
                
                <div class="form">
                <ul id="form-messages"></ul><br>
        
                <label for="username">Username</label>
                <input type="text" id="username" spellcheck="false" autocomplete="off"><br>
        
                <label for="password">Password</label>
                <input type="password" id="password" autocomplete="off"><br>
        
                <button type="submit" id="btn-submit">Login</button>
            </div>
        
        </div>
        </div>'
            ;
        }

?>
</div>

    <!--Ajax script, that takes the form and it's values and sends them via POST to login.php page.-->
    <!--If there is an error (empty username, incorrect password), return and display as message.-->
    <script>
        const form = {
            username: document.getElementById('username'),
            password: document.getElementById('password'),
            submit: document.getElementById('btn-submit'),
            messages: document.getElementById('form-messages')
        };

        //When user clicks the submit button, create a request and sent via POST to login.php.
        form.submit.addEventListener('click', () => {
            const request = new XMLHttpRequest();

            //When the request returns, it will send information.
            request.onload = () => {
                let response = null;

                try {
                    //Parse the information using JSON and add to the response object
                    response = JSON.parse(request.responseText);
                } catch (e) {
                    console.error('Could not parse JSON!');
                }
                //If object is not empty, handle the response.
                if (response) {
                    handleResponse(response);
                }
            };

            //Request data(username and password) are set here.
            const requestData = `username=${form.username.value}&password=${form.password.value}`;

            //Send the request data
            request.open('post', 'login.php');
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.send(requestData);
        });

        //Here the response of the request is handled.
        function handleResponse (response) {
            //If the response parameter ok == true, then redirect the user to the upload.php page.
            if (response.ok) {
                location.href = 'upload.php';
            } else {
                
                while (form.messages.firstChild) {
                    form.messages.removeChild(form.messages.firstChild);
                }

                //Read all error messages from response and populate the list in the login form.
                response.messages.forEach((message) => {
                    const li = document.createElement('li');
                    li.textContent = message;
                    form.messages.appendChild(li);
                });

                //Display the error messages that were previously hidden.
                form.messages.style.display = "block";
            }
        }
    </script>


<?php

//Include the footer page.
include 'footer.php';

?>
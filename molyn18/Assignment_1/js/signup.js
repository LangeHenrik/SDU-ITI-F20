window.addEventListener( "load", function () {
    let msg = document.getElementById( "error" );
    let form = document.getElementById( "register" );

    function sendData() {
        let xhr = new XMLHttpRequest();
        let fd = new FormData( form );


        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 400) {
                msg.innerText = "Password doesn't match or doesn't fulfill requirements";
            }
            if (this.readyState == 4 && this.status == 404) {
                msg.innerText = "User already exists";
            }
            if (this.readyState == 4 && this.status == 200) {
                window.location.replace("index.html");
            }
        };

        xhr.open( "POST", "backend/register.php" );

        xhr.send(fd);
    }


    form.addEventListener( "submit", function ( event ) {
        event.preventDefault();
        sendData();
    } );
} );
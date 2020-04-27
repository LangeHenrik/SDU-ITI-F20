window.addEventListener( "load", function () {
    let msg = document.getElementById( "error" );
    let form = document.getElementById( "login" );

    function sendData() {
        let xhr = new XMLHttpRequest();
        let fd = new FormData( form );


        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 404) {
                msg.innerText = "Wrong username/password";
            }
            if (this.readyState == 4 && this.status == 200) {
                window.location.replace("/molyn18/mvc/public/Home/feed");
            }
        };

        xhr.open( "POST", "/molyn18/mvc/public/User/login" );

        xhr.send(fd);
    }

    form.addEventListener( "submit", function ( event ) {
        event.preventDefault();
        sendData();
    } );
} );
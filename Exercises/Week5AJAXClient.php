<div id="number">x</div>

<script>

    setInterval(ajax, 1000);
    
    function ajax() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("number").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "Week5AJAXServer.php", true);
        xmlhttp.send();
    }

</script>


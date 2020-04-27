var fileUpload = document.getElementById('imageUpload');
var canvas  = document.getElementById('myCanvas');
var ctx = canvas.getContext("2d");

ctx.fillStyle = "#f8f8f8";
ctx.fillRect(0, 0, canvas.width, canvas.height);

function readImage() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    if ( this.files && this.files[0] ) {
        var FR= new FileReader();
        FR.onload = function(e) {
            let img = new Image();
            img.src = e.target.result;
            img.onload = function() {
                let imgSize = Math.min(img.width, img.height);
                let left = (img.width - imgSize) / 2;
                let top = (img.height - imgSize) / 2;
                ctx.drawImage(img, left, top, imgSize, imgSize, 0, 0, ctx.canvas.width, ctx.canvas.height);
                document.getElementById('dataURL').value=canvas.toDataURL("image/jpeg", 1);
            };
        };
        FR.readAsDataURL( this.files[0] );
    }
}

fileUpload.onchange = readImage;
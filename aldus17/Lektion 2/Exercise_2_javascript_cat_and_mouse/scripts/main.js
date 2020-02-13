console.log("successfully loaded JS file");
/*
Make a simple game
▪ Each element is a simple square
▪ A blue square (the mouse) is controlled by the arrow keys on
the keyboard
▪ A red square (the cat) moves towards the mouse at all times
▪ Two or more orange squares (cheese) are spread on the
screen
▪ When the mouse touches a piece of cheese, it disappears
▪ When all cheese is gone, the mouse has won
▪ When the cat touches the mouse, the mouse has lost
▪ Extra challenge: pause/unpause with “p”
*/
var myGamePiece;

function startGame() {
    myGameArea.start();
    myGamePiece = new component(30, 30, "red", 10, 120);
}

function getCanvas() {
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");
}

var myGameArea = {
    canvas = getCanvas(),
    start: function() {
        this.canvas.width = 480;
        this.canvas.height = 270;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.interval = setInterval(updateGameArea, 20);
        window.addEventListener('keydown', function(e) {
            myGameArea.key = e.keyCode;
        })
        window.addEventListener('keyup', function(e) {
            myGameArea.key = false;
        })
    },
    clear: function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    }
}

function component(width, height, color, x, y) {
    this.gamearea = myGameArea;
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;
    this.x = x;
    this.y = y;
    this.update = function() {
        ctx = myGameArea.context;
        ctx.fillStyle = color;
        ctx.fillRect(this.x, this.y, this.width, this.height);
    }
    this.newPos = function() {
        this.x += this.speedX;
        this.y += this.speedY;
    }
}

function updateGameArea() {
    myGameArea.clear();
    myGamePiece.speedX = 0;
    myGamePiece.speedY = 0;
    if (myGameArea.key && myGameArea.key == 37) { myGamePiece.speedX = -1; }
    if (myGameArea.key && myGameArea.key == 39) { myGamePiece.speedX = 1; }
    if (myGameArea.key && myGameArea.key == 38) { myGamePiece.speedY = -1; }
    if (myGameArea.key && myGameArea.key == 40) { myGamePiece.speedY = 1; }
    myGamePiece.newPos();
    myGamePiece.update();
}
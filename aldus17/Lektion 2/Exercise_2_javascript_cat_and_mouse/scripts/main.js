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
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");

function startGame() {
    mouse = new createSquare(30, 30, "blue", 10, 10)
    cat = new createSquare(30, 30, "red", 10, 10)

    chesse = new createSquare(getRndInteger(0, 200), getRndInteger(0, 150), "orange", 10, 10)
}

function getCanvas() {
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    return ctx;

}

function createSquare(posX, posY, color, width, height) {

    ctx = getCanvas();
    ctx.rect(posX, posY, width, height);
    ctx.fillStyle = color;
    ctx.fill();


}

function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
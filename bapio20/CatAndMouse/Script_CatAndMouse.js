var mouse, cat, cheese1, cheese2, cheese3;

function startGame() {
    myGameArea.start();
    mouse = new component(30, 30, "darkblue", Math.random()*970, Math.random()*570);
    cat = new component(45, 45, "red", Math.random()*955, Math.random()*555);
    cheese1 = new component(20, 20, "orange", Math.random()*980, Math.random()*580);
    cheese2 = new component(20, 20, "orange", Math.random()*980, Math.random()*580);
    cheese3 = new component(20, 20, "orange", Math.random()*980, Math.random()*580);
}

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 1000;
        this.canvas.height = 600;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.interval = setInterval(updateGameArea, 20);
        window.addEventListener('keydown', function (e) {
            myGameArea.key = e.keyCode;
        })
        window.addEventListener('keyup', function (e) {
            myGameArea.key = false;
        })
    },
    clear : function(){
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

function remove_cheese(x,y) {
  hide = new component(20,20,"white",x,y);
}

function updateGameArea() {
    myGameArea.clear();
    mouse.speedX = 0;
    mouse.speedY = 0;
    if (myGameArea.key && myGameArea.key == 37) {mouse.speedX = -5; }
    if (myGameArea.key && myGameArea.key == 39) {mouse.speedX = 5; }
    if (myGameArea.key && myGameArea.key == 38) {mouse.speedY = -5; }
    if (myGameArea.key && myGameArea.key == 40) {mouse.speedY = 5; }
    mouse.newPos();
    mouse.update();
    cat.speedX = (15*Math.sign(mouse.x-cat.x))/Math.sqrt(50);
    cat.speedY = (15*Math.sign(mouse.y-cat.y))/Math.sqrt(50);
    cat.newPos();
    cat.update();
    if (-20<(cheese1.x-mouse.x)<30 && -20<(cheese1.y-mouse.y)<30) {}
    if (-20<(cheese2.x-mouse.x)<30 && -20<(cheese2.y-mouse.y)<30) {}
    if (-20<(cheese3.x-mouse.x)<30 && -20<(cheese3.y-mouse.y)<30) {}
    cheese1.update();
    cheese2.update();
    cheese3.update();
}

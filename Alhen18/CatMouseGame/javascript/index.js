var paused = false;
var gameEnded = false;
var width = window.innerWidth - 20;
var height = window.innerHeight - 20;
var points = 0;
var highscore = 0;

var player = {
    element: document.getElementById('player'),
    type: "player",
    x: 100,
    y: 100,
    speed: 2,
    direction: "stop"
};

var cheese = {
    element: document.createElement("DIV"),
    type: "cheese",
    x: 0,
    y: 0,
    speed: 0,
    color: "yellow"
};

var enemy = {
    element: document.createElement("DIV"),
    type: "enemy",
    x: 0,
    y: 0,
    speed: 1.5,
    color: "red"
};

if (localStorage.getItem("highscore") !== null) {
    highscore = parseInt(localStorage.getItem("highscore"), 0);
    document.getElementById('highscore').innerText = highscore;
}

function collision(a, b) {
    if (a.x - 15 < b.x
            && a.x + 15 > b.x
            && a.y - 15 < b.y
            && a.y + 15 > b.y) {
        return true;
    } else {
        return false;
    }
}

function addPoint() {

    points += points;
    document.getElementById('point').innerText = points;

    if (points % 5 === 0) {
        enemy.speed += enemy.speed;
    }
    if (points % 4 === 0) {
        player.speed += player.speed;
    }

}

function move(entity) {

    var ppx = entity.x + "px";
    entity.element.style.left = ppx;
    
    var ppy = entity.y + "px";
    entity.element.style.top = ppy;
}

function moveEnemy() {
    
    var left = player.x - enemy.x;
    var top = player.y - enemy.y;
    if (Math.abs(left) > Math.abs(top)) {
        if (player.x < enemy.x) {
            enemy.x -= enemy.speed;
        } else {
            enemy.x += enemy.speed;
        }
    } else {
        if (player.y < enemy.y) {
            enemy.y -= enemy.speed;
        } else {
            enemy.y += enemy.speed;
        }
    }
    move(enemy);
}

function movePlayer() {

    switch (player.direction) {
    case 'Down':
        player.y += player.speed;
        player.y = Math.min(height, player.y);
        break;
    case 'Up':
        player.y -= player.speed;
        player.y = Math.max(0, player.y);
        break;
    case 'Left':
        player.x -= player.speed;
        player.x = Math.max(0, player.x);
        break;
    case 'Right':
        player.x += player.speed;
        player.x = Math.min(width, player.x);
        break;
    }

    move(player);
}

function gameOver() {
    paused = true;
    gameEnded = true;
    document.getElementById('level').style.backgroundColor = 'green';
    document.getElementById('restart').innerText = 'Press R to restart';
    if (points > highscore) {
        highscore = points;
        document.getElementById('highscore').innerText = highscore;
        localStorage.setItem("highscore", highscore);
    }
}

function spawn(object) {

    object.element = document.createElement("DIV");
    object.element.style.backgroundColor = object.color;
    object.element.style.border = "1px solid black";
    object.element.style.height = "20px";
    object.element.style.width = "20px";
    object.element.style.position = "absolute";
    
    object.x = Math.floor(Math.random() * width);
    object.y = Math.floor(Math.random() * height);

    object.element.style.top = object.y + "px";
    object.element.style.left = object.x + "px";
    
    document.body.appendChild(object.element);
}

function eatCheese() {

    addPoint();
    cheese.element.remove();
    spawn(cheese);
}

function gameloop() {
    if (!paused) {
        movePlayer();
        moveEnemy();

        if (collision(player, cheese)) {
            eatCheese();
        }

        if (collision(player, enemy)) {
            gameOver();
        }
    }
}

function newGame() {
    player.direction = "";
    player.speed = 3;
    player.x = 100;
    player.y = 100;
    
    cheese.element.remove();
    enemy.element.remove();
    enemy.speed = 1;
    spawn(cheese);
    spawn(enemy);
    
    points = 0;
    gameEnded = false;
    paused = false;
    
    document.getElementById('restart').innerText = '';
    document.getElementById('level').style.backgroundColor = 'lightgreen';
}

function keypress(e) {
    if (e.code === "KeyR" && gameEnded) {
        newGame();
    } else if (e.code === "KeyP") {
        if (paused && !gameEnded) {
            paused = false;
        } else {
            paused = true;
        }
    } else {
        player.direction = e.code.substr(5);
    }
}

document.addEventListener('keydown', keypress);

setInterval(gameloop, 10);

spawn(cheese);
spawn(enemy);
// JavaScript file
var ctx = document.getElementsByTagName("canvas")[0].getContext("2d");
var count = 0;
var interval;

clearGraph();

// Fills the canvas with a blank graph, used before each new animation
// and when the page loads.
function clearGraph() {
    ctx.fillStyle = "white";
    ctx.fillRect(0, 0, 800, 500);
    ctx.fillStyle = "black";
    ctx.fillRect(10, 20, 5, 420);
    ctx.fillRect(15, 435, 715, 5);
}

function startAnimation() {
    count = 0;

    interval = setInterval(animateGraph, 1000);
}

function animateGraph() {
    clearGraph();

    let barWidth = 50;
    let barStepover = 20;
    let barHeight = new Array(10);

    // Make heights for the bars
    for(let i = 0; i < 10; i++) {
        barHeight[i] = Math.ceil(Math.random() * 400);
    }

    // Draw the bars
    for(let i = 0; i < 10; i++) {
        ctx.fillStyle = randColor();
        let thisHeight = barHeight[i];

        ctx.fillRect(barStepover * (i + 1) + barWidth * i, 435 - thisHeight, barWidth, thisHeight);
    }

    count++;
}

function stopAnimation() {
    clearInterval(interval);

    ctx.fillStyle = randColor();
    ctx.font = "40px Arial"

    ctx.fillText("Animation stopped", 350, 50);
    ctx.fillText("The graph drawn " + count + " times", 350, 100);
}

// Random Hex color function
function randColor() {
    let letters = "0123456789ABCDEF";
    let color = "#";
    for(let i = 0; i < 6; i++) {
        color += letters.charAt(Math.floor(Math.random() * 16));
    }
    return color;
}
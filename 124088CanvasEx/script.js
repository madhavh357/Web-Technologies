/*
    The JavaScript has the following functions:

    randColor() - creates a random color
    clear() - clears the canvas
    drawCircle() - draws a circle in the center of the canvas, and it prompts the user for the radius
    drawLine() - draws a line from one corner to the other
    drawRect() - draws a rectangle and prompts user for width and height
    drawText() - writes user inputted text onscreen
    drawImg() - puts a random image from an array of 5 images
    drawGradient() - gives the canvas a gradient background with random colors
    scaleShape() - draws an unscaled rectangle and the scaled version of the rectangle
    drawMultiple() - draws squares stacked on each other
    drawSculpture() - draws small quarter circles that together look like a 3d shape
    randFunc() -  calls a random function
*/
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');
let w = 0;
let h = 0;
let images = [
    "https://cdn.pixabay.com/photo/2013/07/18/20/26/sea-164989__480.jpg",
    "https://cdn.pixabay.com/photo/2016/11/29/04/19/ocean-1867285__340.jpg",
    "https://cdn.pixabay.com/photo/2017/03/13/10/25/hummingbird-2139279__340.jpg",
    "https://cdn.pixabay.com/photo/2011/12/13/14/31/earth-11015__340.jpg",
    "https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg"
]

function randColor()
{
    var r = Math.floor(Math.random() * 256);
    var g = Math.floor(Math.random() * 256);
    var b = Math.floor(Math.random() * 256);
    return "rgb(" + r + "," + g + "," + b + ")";
}

function clear()
{
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}

function drawCircle()
{
    clear()
    ctx.beginPath();
    ctx.arc(canvas.width/2, canvas.height/2, parseInt(prompt("Circle Radius:", "50")), 0, 2 * Math.PI);
    ctx.fillStyle = randColor();
    ctx.fill();
}

function drawLine()
{
    clear()
    ctx.beginPath();
    ctx.moveTo(0, 0);
    ctx.lineTo(500, 500);
    ctx.lineWidth = 5;
    ctx.strokeStyle = randColor()
    ctx.stroke();
}

function drawRect()
{
    clear();
    
    ctx.beginPath();
    w = parseFloat(prompt("Rectangle Width:", "50"));
    h = parseFloat(prompt("Rectangle Height:", "50"));

    ctx.rect((canvas.width-w)/2, (canvas.height-h)/2, w, h);
    ctx.fillStyle = randColor();
    ctx.fill();
  
}

function drawText()
{
    clear()
    ctx.textAlign = "center";
    ctx.font = "30px Calibri";
    ctx.fillStyle = randColor();
    ctx.fillText(prompt("What text?", "Hello"), 250, 250);
}

function drawImg()
{
    clear();
    let img = new Image();
    
    img.onload = function() {
        ctx.drawImage(img, 0, 0, 500, 500);
    };
    img.src = images[Math.floor(Math.random()*images.length)];
}

function drawGradient()
{
    clear();
    
    let grd = ctx.createLinearGradient(0, 0, 500, 500);

    grd.addColorStop(0.0, randColor());
    grd.addColorStop(0.33, randColor());
    grd.addColorStop(0.67, randColor())
    grd.addColorStop(1.0, randColor());
    ctx.fillStyle = grd;
    ctx.fillRect(0, 0, 500, 500);
}

function scaleShape()
{
    let c = parseFloat(prompt("Scale by how much?", "2"));

    drawRect();
    
    ctx.scale(c, c);
    
    ctx.rect((canvas.width-w)/(2*c), (canvas.height-h)/(2*c), w, h);
    ctx.fill();
    ctx.stroke();
    ctx.scale(1/c, 1/c);
}

function drawMultiple()
{
    clear();
    for (let i=10; i>0; i--)
    {
        ctx.beginPath();
        let l = i*15;

        ctx.rect((canvas.width-l)/2, (canvas.height-l)/2, l, l);
        ctx.fillStyle = randColor();
        ctx.fill();
    }
}

function drawSculpture()
{
    clear();
    for (let i=0; i<3; i++)
    {
        ctx.beginPath();
        for (let j=0; j<10; j++)
        {
            ctx.arc(Math.random()*500, Math.random()*500, 1, 0, 0.5*Math.PI);
            ctx.fillStyle = randColor();
            ctx.fill();
        }
    }
}

function randFunc()
{
    let functions = [drawCircle, drawLine, drawRect, drawText, drawImg, drawGradient];
    functions[Math.floor(Math.random()*functions.length)]();
}
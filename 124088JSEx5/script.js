// setInterval() runs a function multiple times until the interval is cleared. setTimeout() only runs the function once.
let img;
let x = 0;
let y = 0;
let moveImg;
let angle = 0;
let canRun = true;

function init()
{
    let images = [
        "https://cdn.pixabay.com/photo/2016/11/29/04/19/ocean-1867285__340.jpg",
        "https://cdn.pixabay.com/photo/2017/03/13/10/25/hummingbird-2139279__340.jpg",
        "https://cdn.pixabay.com/photo/2011/12/13/14/31/earth-11015__340.jpg",
        "https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg"
    ];
    img = document.getElementById("image");
    img.src=images[Math.floor(Math.random()*images.length)];
    img.style.position = "absolute";
    img.style.left = "0px";
    img.style.top = "200px";
    img.width = 400;
}

function moveRight()
{
    if (canRun)
    { 
        x=img.offsetLeft;

        moveImg = setInterval(function() {
            if (x<window.innerWidth - img.width)
            {
                x+=10;
                img.style.left = x+"px";
            }
            if (x+10>window.innerWidth-img.width)
            {
                clearInterval(moveImg);
                canRun = true;
            }
        }, 20);
        canRun = false;
    }
    else
        alert("Move back first");
}

function moveBack()
{
    clearInterval(moveImg);
    img.style.left = "0px";
    img.style.top = "200px";
    img.width = 400;
    canRun = true;
}

function moveAcross()
{
    if (canRun)
    {
        x=img.offsetLeft;
        y=img.offsetTop;

        moveImg = setInterval(function() {
            if (x<window.innerWidth - img.width && y<window.innerHeight - img.height)
            {
                x+=10;
                y+=5;
                img.style.left = x+"px";
                img.style.top = y+"px";
            }
            if (x+10>window.innerWidth-img.width || y+5>window.innerHeight - img.height)
            {
                clearInterval(moveImg);
                canRun = true;
            }
        }, 20);

        canRun = false;
    }
    else
        alert("Move back first");
}

function moveDiamond()
{
    if (canRun)
    {
        x=img.offsetLeft;
        y=img.offsetTop;
        img.width=200;

        moveImg = setInterval(function() {
            x=150*Math.pow(Math.cos(angle), 3) + 600;
            y=150*Math.pow(Math.sin(angle), 3) + 350;
            img.style.left = x+"px";
            img.style.top = y+"px";
            angle+=Math.PI/180
        }, 10);

        canRun = false;
    }
    else
        alert("Move back first");
}

function moveCircle()
{
    if (canRun)
    {
        x=img.offsetLeft;
        y=img.offsetTop;
        img.width=200;

        moveImg = setInterval(function() {
            x=150*Math.cos(angle) + 600;
            y=150*Math.sin(angle) + 350;
            img.style.left = x+"px";
            img.style.top = y+"px";
            angle+=Math.PI/180
        }, 6);

        canRun = false;
    }
    else
        alert("Move back first");
}
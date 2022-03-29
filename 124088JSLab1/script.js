let animate;
let count = 0;
let images = [
    "https://cdn.pixabay.com/photo/2016/11/29/04/19/ocean-1867285__340.jpg",
    "https://cdn.pixabay.com/photo/2017/03/13/10/25/hummingbird-2139279__340.jpg",
    "https://cdn.pixabay.com/photo/2011/12/13/14/31/earth-11015__340.jpg",
    "https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg",
    
];

function placeImages()
{
    let row1 = document.getElementsByClassName("row1");
    let row2 = document.getElementsByClassName("row2");
    let row3 = document.getElementsByClassName("row3");
    let row4 = document.getElementsByClassName("row4");
    let row5 = document.getElementsByClassName("row5");
    animate = setInterval(function() {
        let rNum = Math.floor(Math.random()*images.length);
        let rNum2 = Math.floor(Math.random()*images.length);
        let rNum3 = Math.floor(Math.random()*images.length);
        let rNum4 = Math.floor(Math.random()*images.length);
        let rNum5 = Math.floor(Math.random()*images.length);
        for(let i=0; i<row1.length; i++)
        {
            row1[i].src = images[rNum];
            row2[i].src = images[rNum2];
            row3[i].src = images[rNum3];
            row4[i].src = images[rNum4];
            row5[i].src = images[rNum5];
        }
        count += 25;
    }, 1000);
}

function stopImages()
{
    clearInterval(animate);
    document.getElementById("paragraph").innerHTML = "This animation was stopped after placing a total of "+count+" images in the table."
}
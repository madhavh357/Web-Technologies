// These are the variables that store the hour value and the time of day (AM or PM) respectively
let hours;
let mer = "";
function setTime()
{
    // creates a new date object
    // sets hours, minutes, and seconds to the methods that get the hours, minutes, and seconds
    let cDate = new Date();
    hours = cDate.getHours();
    let minutes = cDate.getMinutes();
    let seconds = cDate.getSeconds();
    // if hours are less than 12, it will change to AM. Otherwise, it will change to PM.
    if (hours<12)
    {
        mer="AM";
        // If it is midnight, set hours to 12 so the webpage will not display 0
        if(hours==0)
            hours=12;
    }
    else
    {
        mer="PM";
        // If hours are greater than 12, then subtract 12 from hours to get rid of 24 hour time
        if (hours>12)
            hours-=12;
    }
    // Add "0" in front of minutes and seconds if they are single digits
    if (minutes<10)
        minutes="0"+minutes;
    if(seconds<10)
        seconds="0"+seconds;
    // Display the time using hours, minutes, seconds, and mer variable
    document.getElementById("clock").innerHTML = hours+":"+minutes+":"+seconds+" "+mer;
}

function updateClock()
{
    let img = document.getElementById("image");
    
    // If it is between noon and 5pm, then show the Good Afternoon picture
    if (mer=="PM" && (hours<5 || hours==12))
    {
        img.src="afternoon.jpg";
        img.alt="Good afternoon";
    }
    // If it is after or at 5pm and before 10pm, show the Good Evening picture
    else if (hours>=5 && hours<10 && mer=="PM")
    {
        img.src="evening.jpg";
        img.alt="Good evening";
    }
    // If it is after or at 10pm and before 6am, show Good Night picture
    else if ((hours>=10 && mer=="PM") || ((mer=="AM") && (hours>=12 || hours<6)))
    {
        img.src="night.jpg";
        img.alt = "Good night";
    }
    // If it is after or at 6 am and before noon, show Good Morning picture
    else if (mer="AM" && hours>=6 && hours<12)
    {
        img.src="morning.jpg";
        img.alt="Good morning";
    }
    setTime();
}

// run updateClock() every 1000 milliseconds or 1 second
setInterval(updateClock, 1000);

var id;
var active = false;

function animateString()
{
    /*
        If active variable is false,
        Put the last letter of the string first every 85 milliseconds
        Set active to true - this variable prevents the animation from speeding up if the user hovers over-
        the text box multiple times. Because of this, it can only animate new text once the animation is stopped
    */
    if (!active)
    {
        let message = document.getElementById("message").value;
        id = setInterval(function() {
            message = message[message.length-1]+message.substring(0, message.length-1); 
            document.getElementById("animation").innerHTML = message;
        }, 85)
        active=true;
    }
}

/* 
    Calls clearInterval, which stops the animation
    Sets active to false so the text can be animated again
*/
function stopString()
{
    clearInterval(id);
    active=false;
}


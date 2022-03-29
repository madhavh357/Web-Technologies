/*
    124088
    Q1 Project

    Start of JavaScript file
    Sources:
    https://stackoverflow.com/questions/3357553/how-do-i-store-an-array-in-localstorage
    https://artskydj.github.io/jsPDF/docs/jsPDF.html
    https://stackoverflow.com/questions/17130395/real-mouse-position-in-canvas
    https://www.w3schools.com/Jsref/prop_win_sessionstorage.asp
*/
let descriptions = [
    "\"The Civic sports engaging handling, a comfortable ride, and excellent fuel economy. Its base engine won't knock your socks off, but the optional turbocharged power plant boosts this Honda's street cred. Inside, the Civic is packed with technology, and everything is wrapped in a cool and modern design. Both rows of seats are roomy and comfortable, while the trunk is impressively sized for the segment.\" <br><strong>(https://cars.usnews.com/cars-trucks/honda/civic)</strong>",

    "\"The 2021 Nissan Versa is a subcompact sedan that's one of the most affordable new cars on sale today. It's the least expensive and smallest model in Nissan's lineup, slotting just below the Sentra. Despite the Versa's diminutive dimensions, it offers a surprising amount of cargo space, making it more useful than it might seem. It is also available with plenty of safety features, and the cabin doesn't feel like it was built to a budget. After a full redesign for 2020, the Nissan Versa heads into 2021 relatively unchanged.\" <br><strong>(https://www.edmunds.com/nissan/versa/)</strong>",

    "\"The Yaris is one of the smallest and least expensive vehicles in Toyota's lineup, but it doesn't look or feel like anything else in the automaker's stable. That's mostly because it's based on a Mazda design rather than Toyota's, taking on the engine, tech, and most of the interior and exterior design from the Mazda 2, a car that's no longer sold in America. It might sound like an identity crisis, but the final product is a polished and fun (if slightly underpowered) compact that offers a lot for relatively little.\" <br><strong>(https://www.edmunds.com/toyota/yaris/)</strong>",
    
    "\"The 2022 Toyota Corolla is now in its 12th generation. When a car model lives that long, you know it's doing something right. For decades, the Corolla has been the compact car that's known as a good value with high fuel economy and a reputation for reliability. This latest Corolla still lives up to these core values, only it adds flashier styling and a more premium-feeling interior than its predecessors.\"<br><strong>(https://www.edmunds.com/toyota/corolla/)</strong>",
    
    "\"The 2021 Hyundai Accent is one of just a few remaining extra-small cars on sale today. Most automakers are abandoning the market to focus on building small crossover SUVs. Yet Hyundai remains committed to building small, affordable and feature-rich sedans. The Accent was fully redesigned in 2018 and carries on into the 2021 model year with no significant updates. That's not a bad thing since the Accent offers excellent fuel economy, a good mix of features, and a spacious and comfortable interior. It might not be the fastest car on the market, but its performance is about average for this class.\"<br><strong>(https://www.edmunds.com/hyundai/accent/)</strong>",
    
    "\"Looking to break out of the midsize luxury sedan mold? The 2021 Audi A7 might be an intriguing alternative. It's based on the more traditional A6 sedan but replaces the trunk with a sweeping hatchback. Not only does it give the A7 a sportier fastback profile, but it also greatly increases cargo capacity.\"<br><strong>(https://www.edmunds.com/audi/a7/)</strong>",
    
    "\"The BMW 7 Series has been the flagship sedan of the brand for decades. It fits in the lineup above the 5 Series and alongside the 8 Series Gran Coupe. While the nomenclature makes it seem like the 8 Series Gran Coupe is a step up, it is slightly smaller and has less room inside than the 7 Series and doesn't offer an optional V12 engine. In 2020, the BMW 7 Series received a significant styling and features update and it heads into 2022 with no changes.\"<br><strong>(https://www.edmunds.com/bmw/7-series/)</strong>",
    
    "\"Mercedes' new S-Class certainly sets new standards for luxury and opulence. But you know, you might not be able to afford a six-figure executive sedan with facial recognition and a fingerprint scanner. If so, you might want to consider the 2021 Mercedes-Benz C-Class. Available in sedan, coupe and convertible body styles, the C-Class is a versatile small luxury car that offers an appealing mix of comfort, performance and top-notch construction.\"<br><strong>(https://www.edmunds.com/mercedes-benz/c-class/)</strong>",
    
    "\"Although the Model X debuted over five years ago, it's still essentially a unicorn in the market. Even if you take its showstopping falcon-wing rear doors out of the equation, no other SUV - electric or otherwise - can match the Model X's acceleration. Throw in its impressive 360 miles of estimated driving range and you really do have a one-of-a-kind vehicle.\"<br><strong>(https://www.edmunds.com/tesla/model-x/)</strong>",
    
    "\"An electric Porsche? The idea would have seemed outlandish even just a few years ago. But here we are with the 2021 Porsche Taycan, and it's every bit a Porsche. There's thrilling performance, sleek styling and lots of customization possibility. It's even a traditional Porsche in terms of price. That may not be quite as much to your liking, but at least you know the brand is being consistent.\"<br><strong>(https://www.edmunds.com/porsche/taycan/)</strong>"
]

let moveImg;
let eCars = document.getElementsByClassName("ecar");
let lCars = document.getElementsByClassName("lcar");
let cars = document.getElementsByName("car");

let selected = sessionStorage.getItem("selected");
let price = sessionStorage.getItem("price");
let cross = sessionStorage.getItem("cross");
let crosses = document.getElementsByClassName("x");
let imgs = document.getElementsByTagName("img");
let takenCars;

if (localStorage.getItem("takenCars")!==null)
{
    // JSON.parse used from https://stackoverflow.com/questions/3357553/how-do-i-store-an-array-in-localstorage
    takenCars = JSON.parse(localStorage.getItem("takenCars"));
}
else
{
    takenCars = [];
}

var c = document.getElementById("map");
var ctx;


function init()
{
    for (let i=0; i<eCars.length; i++)
    {
        eCars[i].style.top = i*100 + "px";
        eCars[i].value = "29.99";

        lCars[i].style.top = i*110 - 20 + "px";
        lCars[i].value = "49.99";
    }
    
    // Puts an "x" on the chosen car
    if (cross!==null)
    {
        document.getElementById(cross+"x").src = "x.png";
    }
    
    // Puts x's on all unavailable cars
    for (let i=0; i<takenCars.length; i++)
    {
        document.getElementById(takenCars[i]+"x").src = "x.png";
    }
}

function info() 
{
    // If the car is selected car is in the takenCars array, set selected car and price to null
    if (takenCars.includes(cross))
    {
        selected = null;
        price = null;
    }
    
    // If selected is null, show "None selected" for car
    if (selected == null)
    {
        document.getElementById("model").innerHTML += " <strong>None selected</strong>";
    }
    else
    {
        document.getElementById("model").innerHTML += " <strong>" + selected + "</strong>";
    }

    // If price is null, show "No car selected for price"
    if (price==null)
    {
        document.getElementById("price").innerHTML += " <strong>No car selected</strong>";
    }
    else
    {
        document.getElementById("price").innerHTML += " <strong>$" + price + " per day</strong>";
    }
    
    // Draws an image of a map with marked locations in a canvas
    ctx = c.getContext("2d");
    var img = new Image();
    img.src = "map.png";
    ctx.font = "15px Roboto"
    ctx.textAlign = "center";
    // Writes addresses on the map next to the locations
    img.onload = function() {
        ctx.drawImage(img, 0, 0, 500, 500);
        ctx.fillStyle = "rgb(153, 0, 0)";
        ctx.fillText("1455 Sullivan Rd", 282, 150);

        ctx.fillStyle = "blue";
        ctx.fillText("1500 Sullivan Rd", 288, 310);

        ctx.fillStyle = "orange";
        ctx.fillText("1319 North Randall Rd", 340, 380);
        
        ctx.font = "12px Roboto"
        ctx.fillStyle = "purple";
        ctx.fillText("1685 North Edgelawn Dr", 63, 140);
    };
    
}


function chooseCar(car)
{
    // Gets the chosen car image, caption, and figure
    let chosenCar = document.getElementById(car);
    let carC = document.getElementById(car + "c");
    let carF = document.getElementById(car+"f");
    if (selected == carC.innerHTML)
    {
        // If the user already chose the car, this will alert
        alert("This car is taken. Please choose another one.");
    }
    else
    {
        // sends the car's name, price, and id to sessionStorage
        // sessionStorage stores information until the tab is closed
        sessionStorage.setItem("selected", carC.innerHTML);
        sessionStorage.setItem("price", parseFloat(carF.value));
        sessionStorage.setItem("cross", car);

        let x = chosenCar.offsetLeft;
        // Moves the car towards the top of the screen
        carF.style.top = "80px";
        document.getElementById("next").innerHTML = "Continue to payment";
        document.getElementById("about").innerHTML = descriptions[parseInt(chosenCar.name)];

        // Animates the car moving to the center
        moveImg = setInterval(function() {
            if (carF.className == "ecar")
            {
                if (x+document.getElementById("economy").offsetLeft<window.innerWidth/2 - chosenCar.width+15)
                {
                    x+=20;
                    chosenCar.style.left = x+"px";
                    carC.style.left = x+"px";
                }
            }
            else
            {
                if (x+document.getElementById("luxury").offsetLeft>window.innerWidth/2 - chosenCar.width+45)
                {
                    x-=20;
                    chosenCar.style.left = x+"px";
                    carC.style.left = x+"px";
                }
            }
            
        }, 20);

        document.getElementById("chose").innerHTML = "You selected:"
        // Clears all other images
        for (let i = 0; i<cars.length; i++)
        {
            if (cars[i].id != car + "f")
            {
                cars[i].innerHTML = "";
                cars[i].src = "";
            }
        }
    }
}

function clearChoice()
{
    // Removes stored information reloads page
    sessionStorage.removeItem("selected");
    sessionStorage.removeItem("price");
    sessionStorage.removeItem("cross");
    location.reload();
}

// Mouse tracking function from https://stackoverflow.com/questions/17130395/real-mouse-position-in-canvas
function getMousePos(canvas, evt) {
    var rect = canvas.getBoundingClientRect();
    return {
      x: evt.clientX - rect.left,
      y: evt.clientY - rect.top
    };
}

// Uses a canvas to detect where the user clicks and see if it is a valid pickup location
function changeLoc(evt) {
    var pos = getMousePos(c, evt);

    if (pos.x>=274 && pos.x<=291 && pos.y>=106 && pos.y<=126)
    {
        document.getElementById("loc").innerHTML = "1455 Sullivan Rd, Aurora, IL";
    }
    else if (pos.x>=55 && pos.x<=73 && pos.y>=158 && pos.y<=177)
    {
        document.getElementById("loc").innerHTML = "1685 North Edgelawn Dr, Aurora, IL"
    }
    else if (pos.x>=436 && pos.x<=455 && pos.y>=373 && pos.y<=392)
    {
        document.getElementById("loc").innerHTML = "1319 North Randall Rd, Aurora, IL";
    }
    else if (pos.x>=280 && pos.x<=298 && pos.y>=267 && pos.y<=287)
    {
        document.getElementById("loc").innerHTML = "1500 Sullivan Rd, Aurora, IL";
    }
}

// Uses jsPDF library to create a pdf with the inputted information
function makeInvoice()
{
    var doc = new jsPDF({
        orientation: 'p',
        unit: 'in',
        format: 'letter'
    });
    doc.setFont("times");

    // Accesses important information from the form
    let name = document.getElementById('fName').value + " " + document.getElementById('lName').value;
    let address = document.getElementById("address").value;
    // Calculates the amount of days between the current date and the pickup date
    let start = new Date();
    start.setHours(0, 0, 0, 0);
    let end = new Date(document.getElementById("until").value.replace(/-/g, " "));
    let days = Math.round((end.getTime()-start.getTime())/(1000*60*60*24));

    let phone = document.getElementById("phone").value;
    let email = document.getElementById("email").value;
    let color = document.getElementById("color").value;
    let location = document.getElementById("loc").innerHTML;

    // Finds the total price of the rental
    let total = (price * days).toFixed(2);

    // Array with all elements on pdf invoice
    let elements = [
        name, "Home address: "+address, "Pickup location: "+location, "Car model: "+selected, "Color: "+ color, "Current date: " +start.toLocaleDateString(),
        "Renting until: "+end.toLocaleDateString(), "Renting for: " + days.toString()+ " days", "Rental price: $"+price+" per day",
        "Total price: $" + total, "Phone number: "+phone, "Email: "+email
    ]

    // Validates the form: if no car is selected, no location is selected, or if they chose an invalid date, form will not submit
    if (selected == null || price == null)
    {
        alert("Please select a car");
        return false;
    }
    else if (location=="None selected")
    {
        alert("Please select a location");
        return false;
    }
    else if (days<0)
    {
        alert("Please select a valid date");
        return false;
    }
    else
    {
        let y = 1;
        // writes the information on the form with 0.5 inches of vertical space between each element
        for (let i=0; i<elements.length; i++)
        {
            doc.text(elements[i], 1, y);
            y+=0.5;
        }
        // If checkbox labeled "download" is selected, download invoice. Otherwise, open it in a new tab.
        if (document.getElementById("download").checked)
        {
            doc.save("invoice.pdf");
        }
        else
        {
            doc.output("dataurlnewwindow");
        }
        // Adds the car to an array of already rented cars
        takenCars.push(cross);
        /*
            JSON.stringify from https://stackoverflow.com/questions/3357553/how-do-i-store-an-array-in-localstorage
            Puts the string form of the array into a localStorage variable called "takenCars"
            Local storage saves after the tab is closed, while sessionStorage does not save information after the tab is closed
            To reset the takenCars array, run localStorage.removeItem("takenCars") once at the start of the JS file.
        */
        localStorage.setItem("takenCars", JSON.stringify(takenCars));
    }
}
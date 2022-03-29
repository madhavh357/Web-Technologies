/*122221 & 124088 JSEx3 javascript page 9/8/21*/
function menu()
{
  var value = parseInt(document.getElementById('num').value);
  if(value == 1)
  {
    loop();
  }//if user presses 1 it runs the loop method
  else if (value == 2)
  {
    armstrong();
  }//if user presses 2 it runs the armstrong method
  else if (value == 3) {
    pattern();
  }
  else if (value == 4) {
    password();
  }//if user presses 4 it runs the password method
  else if (value == 5) {
    document.getElementById('par').innerHTML = "<p>Thank you for checking out our website. Good bye!</p>";
    alert("Window will close");
    window.close();
  }//if user presses 5 it exits the page
}


function loop()
{
  var number = parseInt(prompt("Enter number: ","5"));
  var sum = 0;
  for(var i = 1;i<= number;i++)
  {
    sum+=i;
  }
  document.getElementById('par').innerHTML = "<p>The sum of the number using for loop: "+sum+"</p>";
  //for loop that adds up everything
  var j = 0;
  var counter = 0;
  while(counter<=number)
  {
    j+=counter;
    counter++;
  }
  document.getElementById('par').innerHTML += "<p>The sum of the number using while loop: "+j+"</p>";
  //while loop that adds up everything
  j=0;
  counter = 0;
  do
  {
    j+=counter;
    counter++;
  }
  while(counter<=number);
  document.getElementById('par').innerHTML += "<p>The sum of the number using a do while loop: "+j+"</p>";
  //dowhile loop that adds up everything
  //3 loops for loop, while loop, dowhile loop
  /*
  1. If the user only wants the sum of all odd/even numbers I could make the counter skip every other or I could have an if statement with mod to tell if a number was even/odd and add depending which one I want.
  2. If the user wants to insert a condition where they have to stop finding the sum I would use a while loop and put an & with a boolean statement in the loop and then put the condition inside the loop which will turn the condition false if the condition is false.
  3. It would not be that difficult. I would just replace the + with a *.
  4. If I needed to add a range I would have the starting value be the one I want and then it would act the same afterwards, adding up to the end of the range.

  I think that each loop gets the same results obviously, but the dowhile and while loop takes more lines to write. I think the for loop would be the best
  for the task I am currently trying to do. I believe that while loop would be good for stuff where iterations I don't know, and I think that do while would
  be good for when I need something done first.
  */
}


function armstrong()
{
  var stringNum = prompt("Enter 3 digit number: ", "343");
  //gets user input of what number they want to choose
  if(stringNum.length != 3)
  {
    document.getElementById('par').innerHTML += "<p>The number is not 3 digits. try again.</p>";
    return;
  }//if number is not 3 digits long it ends the function
  var num = parseInt(stringNum);
  //parses user input as a number
  var comparisonNum = 0;//the end number that is the addition
  var i =0;//counter variable used to go through the characters of a string
  while(i<stringNum.length)
  {
    comparisonNum += parseInt(stringNum.charAt(i))**3;
    i++;//adds to move on to next character
  }//This cubes the number and finds the comparison number
  if(comparisonNum == num)
  {
      document.getElementById('par').innerHTML = "<p>the number you put in is an armstrong number</p>";
  }//compares the two numbers and tells you if they are equal
  else
  {
    document.getElementById('par').innerHTML = "<p>the number you put in is not an armstrong number</p>";
  }//if the number is not equal it is not an armstrong number
  //makes paragraph for each thing
}


function pattern()
{
  // prompts user for amount of lines in pattern
  let levels = prompt("How many levels?", "5");
  // prompts user for what character to use
  let character = prompt("What character?", "*");
  // clears paragraph so it does not include previous results
  document.getElementById("par").innerHTML = "";

  // loops through each line
  for (var i=1; i<=parseInt(levels); i++)
  {
    // loops for each star in each line
    for (var j=0; j<i; j++)
    {
        // adds star
        document.getElementById("par").innerHTML += character;
    }
    // creates a new line
    document.getElementById("par").innerHTML += "<br>";
  }
}


function password()
{
  // Asks user for first and last name
  let fName = prompt("Enter your first name", "John");
  let lName = prompt("Enter your last name", "Smith");

  // creates a password first letter of first name, 10, and the last 2 letters of last name
  let password = fName.substring(0, 1).toUpperCase() + 10 + lName.substring(lName.length-2).toLowerCase();
  // sets paragraph text to password
  document.getElementById("par").innerHTML = password;
}

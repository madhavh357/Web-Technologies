/**122295, 124088
9/3/21
java script sheet with functions
**/

/**MAdlib function, gets input changes madlib:**/
function madlib(){
	var locations = prompt("Please enter a location: ", "IMSA");
	var name = prompt("Please enter a name: ", "Jane");
	var verb = prompt("Please enter a verb: ", "climbed");
	var color = prompt("Please enter a color: ", "burgundy");
	var times = prompt("Please enter a time: ", "10,000");

	
	var story = "Today was the first day at location, and name was very late. So, they verb as fast as they could to location. However, name dropped their color backpack and spilled everything. They ended up being time minutes late."
	var newStoryLocation = story.replace(/location/gi, locations);
	var newStoryName = newStoryLocation.replace(/name/gi, name);
	var newStoryVerb = newStoryName.replace(/verb/gi, verb);
	var newStoryColor = newStoryVerb.replace(/color/ig, color);
	var newStoryTime = newStoryColor.replace(/time/ig, times);
	document.getElementById("text").innerHTML = "<h4>My modified Story</h4>";
	document.getElementById("text").innerHTML += newStoryTime;
	document.getElementById("text").innerHTML += "<h4>Here is the story in all upercase:</h4><br>";
	document.getElementById("text").innerHTML += newStoryTime.toUpperCase();
	document.getElementById("text").innerHTML += "<h4>Here is the story in red:</h4><br>";
	document.getElementById("text").innerHTML += "<span style = 'color: red'>" + newStoryTime + "</span>";
	document.getElementById("text").innerHTML += "<h4>Here is the story in bold:</h4><br>";
	document.getElementById("text").innerHTML += "<b>" + newStoryTime + "<b>";

	
}
/**Main calculator function. Gets input and evaluates it.**/
function calculator()
{
    let name = prompt("Enter expression", "5+5");
    document.write("<h1 id='input'>"+name+" = <span style='background-color: red; color: white'>"+eval(name).toFixed(2)+"</span>"+"</h1>")
}
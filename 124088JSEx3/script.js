function pattern()
{
    let levels = prompt("How many levels?", "5");
    document.getElementById("par").innerHTML = "";
    
    for (var i=1; i<=parseInt(levels); i++)
    {
        for (var j=0; j<i; j++)
        {
            document.getElementById("par").innerHTML += "*";
        }
        document.getElementById("par").innerHTML += "<br>";
    }
}

function password()
{
    let fName = prompt("Enter your first name", "John");
    let lName = prompt("Enter your last name", "Smith");
    let password = fName.substring(0, 1).toUpperCase() + 10 + lName.substring(lName.length-2).toLowerCase();
    document.getElementById("par").innerHTML = password;
}

function chooseFunc()
{
    let n = document.getElementById("num").value;
    if (n==1)
    {

    }
    else if (n==2)
    {

    }
    else if (n==3)
    {
        pattern();
    }
    else if (n==4)
    {
        password();
    }
    else if (n==5)
    {

    }
}
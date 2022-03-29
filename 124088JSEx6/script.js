// JavaScript

// Function takes bill, percent, and people values from HTML inputs and calculates the tip value
function calculateTip()
{
    let bill = document.getElementById("bill").value;
    let percent = parseFloat(document.getElementById("percent").value);
    let ppl = document.getElementById("ppl").value;

    if (bill<=0 || ppl<=0)
    {
        alert("Please enter valid values");
    }
    else
    {
        let tip = ((bill * percent) / ppl).toFixed(2);
        document.getElementById("h3").innerHTML = "TIP AMOUNT";
        document.getElementById("amount").innerHTML = "$" + tip;
        document.getElementById("each").innerHTML = "each";
    }
}
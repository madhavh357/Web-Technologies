// 124088

// This function takes a string as a parameter and it prints a message in red
function incorrect(page)
{
    let div = document.getElementById("login");
    let message = document.getElementById("message");
    if (page=="login")
    {
        message.innerHTML = "Username or password is incorrect";
    }
    else if (page=="register")
    {
        message.innerHTML = "This username or email is already taken";
    }
    else if (page=="password")
    {
        message.innerHTML = "The passwords do not match";
    }
    else if (page=="missing")
    {
        message.innerHTML = "Please fill out all of the fields";
    }
    else if (page=="email")
    {
        message.innerHTML = "There is no account associated with this email";
    }
    else if (page=="reset")
    {
        message.innerHTML = "Could not update password";
    }
    div.style.borderColor = "rgb(184, 52, 52)";
    div.style.boxShadow = "0px 8px 16px 0px rgba(226, 8, 8,0.4)"
    message.style.color = "rgb(184, 52, 52)";
}

// Makes sure that the passwords in both password fields match
function confirmPassword()
{
    let passwords = document.getElementsByClassName("password");
    if (passwords[0].value==passwords[1].value)
    {
        return true;
    }
    else
    {
        incorrect("password");
        return false;
    }
}

// Prints a message in the email box about the success of the email
function emailSent(successful)
{
    let message = document.getElementById("message");
    message.style.fontWeight = "bold";
    if (successful)
    {
        message.innerHTML = "Email sent successfully! It may be in spam.";
        message.style.color = "green";
    }
    else
    {
        message.innerHTML = "Email could not be sent";
        incorrect("notsent");       // Using a parameter that is not accounted for in the function - this way, the box turns red but no text is displayed
    }
}


// From https://www.w3schools.com/howto/howto_js_dropdown.asp
function dropMenu()
{
    document.getElementById("myDropdown").classList.toggle("show");
    if (document.getElementById("myDropdown").classList.contains("show"))
        document.getElementById("arrow").innerHTML = "&#9650;";
    else
        document.getElementById("arrow").innerHTML = "&#9660;";

}

window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
          document.getElementById("arrow").innerHTML = "&#9660;";
        }
      }
    }
}
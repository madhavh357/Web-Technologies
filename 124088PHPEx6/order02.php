<?php
    // session_start();
?>
<!DOCTYPE html>
<?php
    setcookie("name", $_POST["name"], time()+180);
    setcookie("model", $_POST["model"], time()+180);
    // $_SESSION["name"] = $_POST["name"];
    // $_SESSION["model"] = $_POST["model"];
?>
<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <h1>Select a Color</h1>
        <form action="order03.php" method="post">
            <label class="q">Please select the car color:</label><br>
            <label><span>required*</span></label>
            <input type="radio" name="color" value="Red"><label>Red</label><br>
            <input type="radio" name="color" value="Blue"><label>Blue</label><br>
            <input type="radio" name="color" value="Yellow"><label>Yellow</label><br>

            <input type="submit" value="Your Choice">
        </form>
    </body>
</html>
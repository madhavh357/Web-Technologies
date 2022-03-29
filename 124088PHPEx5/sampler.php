<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css">
         <style>
            <?php
                // using work around because external style is not working
                include "style.css";
            ?>
        </style> 
    </head>

    <body>
        <?php
            include "header.php";

            $red = $_POST['red'];
            $green = $_POST['green'];
            $blue = $_POST['blue'];
            $message = $_POST['message'];
            
            echo "<h3>Here are your chosen rgb colors:</h3>";
            echo "<h4>Red: $red, Green: $green, Blue: $blue</h4>";
            echo "<div id='div' style='background-color: rgb($red, $green, $blue); border: 5px inset rgb($blue, $red, $green)'>";
            echo "<p style='color: rgb($green, $blue, $red);'>$message</p></div>";

            $color = '"color.php"';
            echo "<input type='button' value='Go back' onclick='window.location.href=$color'>";
        ?>
    </body>
</html>
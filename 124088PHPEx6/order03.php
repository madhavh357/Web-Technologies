<?php
    //session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <h1>Order Confirmation</h1>
        <?php
            // $name = $_SESSION["name"];
            // $model = $_SESSION["model"];
            $name = $_COOKIE["name"];
            $model = $_COOKIE["model"];
            $color = $_POST["color"];
            $filename = $model . $color . ".jpg";

            echo "<p>Congratulations $name, you have ordered a $color $model</p><br>";
            echo "<img src='$filename'><br><br>";
        ?>
        <a href="order01.html">Select a new Car</a>
        <h2>Thank you for visiting my page!</h2>
    </body>
</html>
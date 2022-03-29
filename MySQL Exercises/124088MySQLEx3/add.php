<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
            require_once "config.php";

            mysqli_select_db($conn, "sqlex3");

            $name = $_POST["name"];
            $age = $_POST["age"];
            $email = $_POST["email"];
            $sql = "INSERT INTO Users (namef, age, email) VALUES ('$name', $age, '$email')";

            if (mysqli_query($conn, $sql))
            {
                echo "<h3>The data has been added to a table.</h3>";
                echo "<h3>Click on the link below to view the data or go back to add more data</h3>";
                echo "<a href='view.php'>View Result</a> OR <a href='add.html'>Go Back</a>";
            }
            else
            {
                echo "<h3>That user is already in the database</h3>";
                echo "<h3>Click on the link below to view the data or go back to add more data</h3>";
                echo "<a href='view.php'>View Result</a> OR <a href='add.html'>Go Back</a>";
            }

        ?>
    </body>
</html>
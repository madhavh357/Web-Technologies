<!-- 
    124088
    November 11, 2021
    PHP and MySQL File Manipulation
 -->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>IMSA Staff Database</title>
    </head>

    <body>
        <h1>IMSA LookUp Service</h1>
        <p>You can look up an IMSA employee and their average years of service at IMSA.</p>
        <p>Please enter the employee's full name</p><br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="get">
            <label>Search:</label>
            <input type="text" name="name" required><br>
            <input name="submit" type="submit" value="Find Me">
        </form>
        
        <?php
            require "config.php";

            // Create database
            $sql = "CREATE DATABASE if not exists imsasearch";
            if (mysqli_query($conn, $sql)) {
                // echo "Database created successfully";
            } else {
                echo "Error creating database: " . mysqli_error($conn);
            }
            mysqli_select_db($conn, "imsasearch");

            // Removes white spaces from either side, backslashes, and converts special characters into HTML entities
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            // queries and gets max experience
            function findMax($conn)
            {
                $result = mysqli_query($conn, "SELECT Name, experience FROM employee WHERE experience=(SELECT MAX(experience) FROM employee)");

                return mysqli_fetch_array($result);
            }

            // Finds the average number of years of working
            function findAverage($conn)
            {
                $result = mysqli_query($conn, "SELECT AVG(experience) FROM employee");
                $avg = intval(mysqli_fetch_array($result)[0]);
                return $avg;
            }

            // Only runs if submit button is set and the name field is not empty
            if(isset($_GET['submit']) && !empty($_GET["name"]))
            {
                $search_name = test_input($_GET["name"]);
                
                echo "<div>";

                $sql = "SELECT * FROM employee WHERE Name = '$search_name'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    
                    $row = mysqli_fetch_assoc($result);
                    $position = preg_replace("/[^A-Za-z]/", '', $row["Title"]);
                    $username = $row["userName"];
                    $years = test_input($row["experience"]);

                    echo "
                        <p>The name, $search_name, is found in the database</p>
                        <p>$search_name has worked for $years years at IMSA</p>
                        <p>https://imsa.edu/$position/$username</p><br>
                    ";
                        
                }
                else {
                    echo "<p>The name, $search_name, is not found in the database</p>";
                    echo "<p>https://www.imsa.edu/</p><br>";
                }
                
                $max = findMax($conn);
                $avg = findAverage($conn);

                echo "<p>The employee, $max[0], has worked at IMSA the longest time, $max[1] years</p>";
                echo "<p>The average service of an IMSA employee is $avg years</p></div>";
            }
        ?>
        
    </body>
</html>
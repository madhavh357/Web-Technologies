<!-- 
    124088
    November 11, 2021
    PHP File Manipulation
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
            // Removes white spaces from either side, backslashes, and converts special characters into HTML entities
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            // Loops through array of staff and finds staff member who has worked at IMSA the longest
            function findMax($arr)
            {
                $max = 0;
                $name = "";
                foreach($arr as $value)
                {
                    $list = preg_split("/\t+/", $value);
                    if (intval($list[3])>$max)
                    {
                        $max = intval($list[3]);
                        $name = $list[0];
                    }
                }
                return "The employee, $name, has worked at IMSA the longest time, $max years";
            }

            // Finds the average number of years of working
            function findAverage($arr)
            {
                $sum = 0;
                foreach($arr as $value)
                {
                    $list = preg_split("/\t+/", $value);
                    $sum += intval($list[3]);
                }
                $avg = $sum/count($arr);
                return "The average service of an IMSA employee is $avg years";
            }

            // Only runs if submit button is set and the name field is not empty
            if(isset($_GET['submit']) && !empty($_GET["name"]))
            {
                $search_name = test_input($_GET["name"]);
                // accesses the file and separates into an array by line
                $data = file_get_contents("employee-1.txt");
                $arr = explode("\n", $data);
                $found = false;
                // begins the output text file message
                $message = "-------------------------------------\n";
                
                echo "<div>";

                foreach($arr as $value)
                {
                    // separates each line into an array by tab
                    $list = preg_split("/\t+/", $value);
                    if ($search_name == test_input($list[0]))
                    {
                        // sets found to true so if statement later does not run
                        $found = true;
                        // removes special characters and numbers from position
                        $position = preg_replace("/[^A-Za-z]/", '', $list[2]);
                        $username = $list[1];
                        $years = test_input($list[3]);
                        echo "
                            <p>The name, $search_name, is found in the file</p>
                            <p>$search_name has worked for $years years at IMSA</p>
                            <p>https://imsa.edu/$position/$username</p><br>
                        ";
                        // adds to output file message
                        $message = $message .
                        "The name, $search_name, is found in the file\n$search_name has worked for $years years at IMSA\nhttps://imsa.edu/$position/$username\n\n";
                    }
                    
                }

                // runs if the name is not found
                if (!$found)
                {
                    echo "<p>The name, $search_name, is not found in the file</p><br>";
                    echo "<p>https://www.imsa.edu/</p>";
                    $message = "The name, $search_name, is not found in the file\n\n";
                }

                // adds max years and average years to file
                $message = $message . findMax($arr) . "\n" . findAverage($arr) . "\n\n";

                echo "<p>" . findMax($arr) . "</p>";
                echo "<p>" . findAverage($arr) . "</p>";
                echo "<p>Message has been written to an output file</p></div>";

                # opens/creates file, writes text, and closes file
                $output = fopen("output.txt", "a+");
                fwrite($output, $message);
                fclose($output);
                
                # link to view file
                echo '<a href="output.txt" target="_blank">View output file</a>';
            }
        ?>
        
    </body>
</html>
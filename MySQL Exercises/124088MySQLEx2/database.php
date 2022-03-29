<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php
            require "config.php";

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            // Exits the php if any of the fields are not filled
            if (empty($_POST["first"]) || empty($_POST["last"]) || empty($_POST["date"]) || empty($_POST["score"]))
            {
                echo "<a href='form.html'>Register Users</a>";
                exit;
            }

            $fName = test_input($_POST["first"]);
            $lName = test_input($_POST["last"]);
            $date = $_POST["date"];
            $score = intval($_POST["score"]);

            $sql = "CREATE DATABASE IF NOT EXISTS grades";
            mysqli_query($conn, $sql);

            mysqli_select_db($conn, "grades");

            $sql = "CREATE TABLE IF NOT EXISTS Quizzes (
                fName varchar(30) NOT NULL,
                lName varchar(30) NOT NULL,
                dTest DATE NOT NULL,
                score int NOT NULL,
                UNIQUE KEY(fName, lName)
            )";

            mysqli_query($conn, $sql);

            $sql = "INSERT INTO Quizzes (fName, lName, dTest, score) VALUES ('$fName', '$lName', '$date', '$score')";
            mysqli_query($conn, $sql);

            $sql = "SELECT * FROM Quizzes";
            $result = mysqli_query($conn, $sql);

            echo "<h2>Query 1 Results:</h2>";

            foreach ($result as $row)
            {
                echo 
                    "<ul>
                        <li>First name: " . $row['fName'] . "</li>
                        <li>Last name: " . $row['lName'] . "</li>
                        <li>Date of Test: " . $row["dTest"] . "</li>
                        <li>Score: " . $row['score'] . "</li>
                    </ul>";
            }

            $sql = "SELECT * FROM Quizzes WHERE score < 70";
            $result = mysqli_query($conn, $sql);

            echo "<h2>Query 2 Results:</h2>";

            if (mysqli_num_rows($result) > 0)
            {
                echo "<h4>Students who scored less than a 70:</h4>";
                foreach ($result as $row)
                {
                    echo 
                        "<ul>
                            <li>First name: " . $row['fName'] . "</li>
                            <li>Last name: " . $row['lName'] . "</li>
                            <li>Date of Test: " . $row["dTest"] . "</li>
                            <li>Score: " . $row['score'] . "</li>
                        </ul>";
                }
            }
            else
            {
                echo "There are no students with a score below 70";
            }

            $sql = "SELECT * FROM Quizzes WHERE dTest < '2021-11-10'";
            $result = mysqli_query($conn, $sql);

            echo "<h2>Query 3 Results:</h2>";
            
            if (mysqli_num_rows($result)>0)
            {
                echo "<h4>Students who took the test before November 10:</h4>";
                foreach ($result as $row)
                {
                    echo 
                        "<ul>
                            <li>" . $row['fName'] . " " . $row['lName'] . "</li>
                            <li>Date of Test: " . $row["dTest"] . "</li>
                        </ul>";
                }
            }
            else
            {
                echo "No students took the test before November 10";
            }
            echo "Register more users: <a href=form.html>here</a>";
        ?>
    </body>
</html>
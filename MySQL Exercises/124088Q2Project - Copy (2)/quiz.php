<!-- 124088 -->
<?php
    require "config.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="script.js"></script>
        <title>Quiz</title>
    </head>

    <body id="quizbody">
        <?php             
            echo "
                <div id='nav'>
                    <a id='home' href='index.php'>Home</a>
                    <a id='quizzes' class='active' href='menu.php'>Quizzes</a>
                    <div class='dropdown'>
                        <button onclick='dropMenu()' class='dropbtn'>" . $_SESSION["user"]["Username"] . "<span id='arrow'>&#9660;</span></button>";?>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="display.php">Account Information</a>
                            <a href="logout.php">Sign out</a>
                        </div>
                    </div>
                </div>
        <?php

            // The value of the submit buttons from the previous page
            if (isset($_POST["choosequiz"]))
            {
                $headings = array("csquiz"=>"Computer Science and Math Quiz", "musicquiz"=>"Music and Movies Quiz");
                $heading = $headings[$_POST["choosequiz"]];
                echo "<h1>$heading</h1>";
                
                // Randomly selects 5 questions
                $sql = "SELECT * FROM $_POST[choosequiz] ORDER BY RAND() LIMIT 5";
                $questions = mysqli_query($conn, $sql);
                $q = 0;
                ?>
                <!-- Creates the quiz form -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <?php
                foreach ($questions as $question)
                {
                    $q++;
                    $id = "q$q";
                    $name = $question["Namef"];
                    echo "<p>$q. $question[Question]</p>";
                    echo "
                    <input type='radio' id='$id-1' name=$name value='$question[Choice1]' required>
                    <label class='quiz' for='$id-1'>$question[Choice1]</label>
                    <input type='radio' id='$id-2' name=$name value='$question[Choice2]' required>
                    <label class='quiz' for='$id-2'>$question[Choice2]</label>
                    <input type='radio' id='$id-3' name=$name value='$question[Choice3]' required>
                    <label class='quiz' for='$id-3'>$question[Choice3]</label><br><br><hr><br>";
                }
                echo "<button type='submit' name='submit' value='$_POST[choosequiz]'>Submit</button>";
                echo "</form>";
            }
            // After the quiz is stuffing
            else if (isset($_POST["submit"]))
            {
                $quiz = $_POST["submit"];
                // Strings to access columns in database
                $attemptString = $quiz . "attempts";
                $scoreString = $quiz . "score";
                
                // Increments attempts
                $_SESSION["user"][$attemptString]++;
                $score = 0;
                // Goes back to home page if there are more than 3 attempts
                // This prevents the user from reloading the page with their grade multiple times.
                // If this was not here, they could reload that page many times and their attempts could go above 3
                if ($_SESSION["user"][$attemptString] > 3)
                {
                    $_SESSION["user"][$attemptString]--;
                    header("Location: index.php");
                }

                foreach ($_POST as $name => $value)
                {
                    $sql = "SELECT Correct FROM $quiz WHERE Namef='$name'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)==0)
                    {
                        continue;
                    }
                    $question = mysqli_fetch_array($result);
                    if ($question["Correct"] == $value)
                    {
                        // Adds to the score every time there is a correct answer
                        $score++;
                    }
                }
                // Score/5 *100 is percentage
                $score = $score/5 * 100;
                $attempts = $_SESSION["user"][$attemptString];

                $username = $_SESSION["user"]["Username"];
                // If the new score is higher than the old score, update the score and the attempts. Otherwise, just update the attempts
                if (is_null($_SESSION["user"][$scoreString]) || $score > $_SESSION["user"][$scoreString])
                {
                    $_SESSION["user"][$scoreString] = $score;

                    mysqli_query($conn, "UPDATE users SET $attemptString=$attempts, $scoreString=$score WHERE Username='$username'");
                }
                else
                {
                    mysqli_query($conn, "UPDATE users SET $attemptString=$attempts WHERE Username='$username'");
                }

                if ($score >= 70)
                {
                    echo "<h1>You passed with a score of $score%!";
                    echo "<h1>Congratulations!</h1>";
                    echo "<img src='Gold_Star.png' alt='star'>";
                    echo "<h3>Go <a href='index.php'>home</a> or see <a href='menu.php'>available quizzes</a></h3>";
                    echo "<h3><a href='login.php'>Login page</a></h3>";
                }
                else
                {
                    echo "<h1>A passing score is 70%</h1>";
                    echo "<h1>Your score is $score%</h1>";
                    echo "<h3>Go <a href='index.php'>home</a> or see <a href='menu.php'>available quizzes</h3>";
                    echo "<h3><a href='login.php'>Login page</a></h3>";
                    echo "<div id='instructions'>";
                    echo "<h3>Resources to review</h3>";

                    // resources to improve score
                    if ($quiz=="csquiz")
                    {
                        echo "
                            <a target='_blank' href='https://w3schools.com'>W3Schools</a><br><br>
                            <a target='_blank' href='https://khanacademy.org'>Khan academy</a><br><br>
                            <a target='_blank' href='https://ocw.mit.edu/index.htm'>MIT OpenCourseWare</a>
                        </div>
                        ";
                    }
                    else
                    {
                        echo "
                            <a target='_blank' href='https://en.wikipedia.org/wiki/Music_theory'>Wikipedia</a><br><br>
                            <a target='_blank' href='https://www.classical-music.com/features/articles/top-film-composers-ever/'>Movie music composers</a>
                        </div>
                        ";
                    }
                }
                
            }
            // If there is no $_POST data, it goes back to the home page
            else
            {
                header("Location: index.php");
            }
        ?>
    </body>
</html>
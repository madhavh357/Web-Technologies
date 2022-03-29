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
        <title>Quiz Menu</title>
    </head>

    <body>
        <?php
            if (!isset($_SESSION["user"]))
            {
                header("Location: login.php");
            }
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
        <h1>Choose a quiz</h1>
        <p>A passing score is 70%</p>
        <p>You can only retake the quiz if you do not pass, and you get 3 attempts</p>
        <p>Good luck and have fun!</p>
        <form action="quiz.php" method="post">
            <div class="menu" id="csquiz">
                <h3>Computer Science and Math Quiz</h3>
                <p><b>This is a fun quiz that asks about a range of computer science and math topics. If that interests you, try it!</b></p><br>
                <?php
                    // Displays the attempts and best score
                    echo "<p>Attempts: " . $_SESSION["user"]["csquizattempts"] . "</p>";
                    if (is_null($_SESSION["user"]["csquizscore"]))
                    {
                        echo "<p>Best score: --</p>";
                    }
                    else
                    {
                        echo "<p>Best score: " . $_SESSION["user"]["csquizscore"] . "%</p>";
                    }
                    
                    // If the attempts are less than 3 and their score is less than 70, the button is there. Otherwise, the button does not show up
                    if ($_SESSION["user"]["csquizattempts"] < 3 && $_SESSION["user"]["csquizscore"] < 70)
                    {
                        echo '<button type="submit" class="choosequiz" value="csquiz" name="choosequiz">Take this quiz</button>';
                    }
                    else
                    {
                        echo "<p>You cannot retake this quiz</p>";
                    }
                ?>
                
            </div>

            <div class="menu" id="musicquiz">
                <h3>Music and Movies Quiz</h3>
                <p><b>This quiz has a variety of questions relating to music, music in movies, and movies in general.</b></p><br>
                <?php
                    echo "<p>Attempts: " . $_SESSION["user"]["musicquizattempts"] . "</p>";
                    if (is_null($_SESSION["user"]["musicquizscore"]))
                    {
                        echo "<p>Best score: --</p>";
                    }
                    else
                    {
                        echo "<p>Best score: " . $_SESSION["user"]["musicquizscore"] . "%</p>";
                    }
                    
                    // The submit buttons' values indicate which quiz is chosen to quiz.php
                    if ($_SESSION["user"]["musicquizattempts"] < 3 && $_SESSION["user"]["musicquizscore"] < 70)
                    {
                        echo '<button type="submit" class="choosequiz" value="musicquiz" name="choosequiz">Take this quiz</button>';
                    }
                    else
                    {
                        echo "<p>You cannot retake this quiz</p>";
                    }
                ?>
            </div>
        </form>
    </body>
</html>
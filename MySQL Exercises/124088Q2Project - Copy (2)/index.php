<!-- 
    124088
    Web Tech Q2 Project
    December 12, 2021
 -->
<?php
    require "config.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="script.js"></script>
        <title>IMSA Quizzes Home</title>
    </head>
<!-- 
    Background has id so that it can have a different background
 -->
    <body id="homepage">
        <?php
        // If a user is logged in, it displays a nav bar that includes a link to the quizzes and has a dropdown menu
            if (isset($_SESSION["user"]))
            {
                // Dropdown menu from https://www.w3schools.com/howto/howto_js_dropdown.asp
                echo "
                <div id='nav'>
                    <a id='home' class='active' href='index.php'>Home</a>
                    <a id='quizzes' href='menu.php'>Quizzes</a>
                    <div class='dropdown'>
                        <button onclick='dropMenu()' class='dropbtn'>" . $_SESSION["user"]["Username"] . "<span id='arrow'>&#9660;</span></button>";?>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="display.php">Account Information</a>
                            <a href="logout.php">Sign out</a>
                        </div>
                    </div>
                </div>
            <?php
                echo "<h1>Hello " . $_SESSION["user"]["fname"] . "!</h1>";
            ?>
                <div id="instructions">
                    <h2>Welcome to the IMSA Quiz Page!</h2>
                    
                    <h3>Quiz instructions:</h3>
                    <p>A passing score is at least 70%.</p>
                    <p>Once you achieve a passing score, you cannot retake the quiz.</p>
                    <p>You have three chances to take the quiz if you do not pass.</p>
                    <h3>Click <a href="menu.php">here</a> to see available quizzes</h3>
                </div>
            <?php
            }
            else
            {?>
            <!-- 
                This nav bar is displayed when there user is not signed in
             -->
                <ul>
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href='login.php'>Login</a></li>
                    <li><a href='register.php'>Register</a></li>
                </ul>
                <h1>Welcome to the IMSA Quiz Page!</h1>
                <div id="instructions">
                    <h2>Quiz instructions:</h2>
                    <p>A passing score is at least 70%.</p>
                    <p>Once you achieve a passing score, you cannot retake the quiz.</p>
                    <p>You have three chances to take the quiz if you do not pass.</p>
                    <h3>So <a href='login.php'>login</a> or <a href='register.php'>create an account</a> to start!</h3>
                </div>
                
        <?php
            }
        ?>
        
    </body>
</html>
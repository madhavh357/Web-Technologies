<!-- 
    124088
    Goes to this page if the password is changed successfully
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
        <title>Password changed successfully</title>
    </head>

    <body>
        <?php
            if (isset($_SESSION["user"]))
            {
                echo "
                <div id='nav'>
                    <a id='home' href='index.php'>Home</a>
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
            }
            else
            {
        ?>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href='login.php'>Login</a></li>
                    <li><a href='register.php'>Register</a></li>
                </ul>
        <?php
            }
        ?>
        <div id="instructions">
            <h2>Your password was changed succesfully</h2>
            
            <h3><a href="index.php">Go to main page</a></h3>
            <h3><a href="menu.php">Go to quiz menu page</a></h3>
            <h3><a href="login.php">Sign in</a></h3>
            <h3><a href="register.php">Register</a></h3>
            <h3><a href="logout.php">Sign out</a></h3>
            <h3><a href="display.php">View account information</a></h3>
        </div>
    </body>

</html>
<!-- 
    124088
    Shows user info
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
        <title>Account Information</title>
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
                header("Location: login.php");
            }?>

        <h1>Account Information</h1>
        <table>
            <tr>
                <td>First name</td>
                <td><?php echo $_SESSION["user"]["fname"]; ?></td>
            </tr>

            <tr>
                <td>Last name</td>
                <td><?php echo $_SESSION["user"]["lname"]; ?></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><?php echo $_SESSION["user"]["email"]; ?></td>
            </tr>

            <tr>
                <td>Username</td>
                <td><?php echo $_SESSION["user"]["Username"]; ?></td>
            </tr>

            <tr>
                <td>Password</td>
                <td>&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;<br><a href="reset.php">Edit</a></td>
            </tr>
        </table>
        <!-- Delete link -->
        <a id="delete" onclick="return confirm('Are you sure you want to delete your account? This cannot be undone.')" href="delete.php">Delete account</a>
    </body>
</html>
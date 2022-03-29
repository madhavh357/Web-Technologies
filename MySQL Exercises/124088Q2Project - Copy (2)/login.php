<!-- 124088 -->
<?php
    require "config.php";
    // logs the current user out
    session_unset();
?>

<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="script.js"></script>
        <title>Log in to IMSA Quizzes</title>
    </head> 

    <body>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href='login.php'>Login</a></li>
            <li><a href='register.php'>Register</a></li>
        </ul>

        <h1>Log in</h1>

        <div id="login">
            <!-- self submitting form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div id="fields" class="login">
                    <h2>Please fill out the following fields</h2>
                    <label>Username or email:</label><input type="text" name="username" onkeypress="return event.charCode != 32" required><br>
                    <label>Password:</label><input type="password" name="password" required><br>
                    <input id="submit" type="submit" name="submit" value="Login">
                    <p id="message"></p>
                </div>
                <div id="forgot">
                    <p>Forgot your password? <a href="reset.php">Reset it here</a></p>
                    <p>Don't have an account? <a href="register.php">Register here</a></p>
                </div>
            </form>
            
        </div>

        <?php
            if (isset($_POST["submit"]))
            {
                // server side form validation
                if (empty($_POST["username"]) || empty ($_POST["password"]))
                {
                    echo "<script>incorrect('missing');</script>";
                    exit;
                }

                $username = test_input($_POST["username"]);
                // hashes password
                $password = md5($_POST["password"]);

                // Queries the database for user with these credentials
                $sql = "SELECT * FROM users WHERE (Username = '$username' OR email = '$username') AND Pword = '$password'";
                $result = mysqli_query($conn, $sql);

                // Checks if there is a result
                if (mysqli_num_rows($result) > 0)
                {
                    echo "Login successful";
                    // Stores the user array in a session variable
                    $_SESSION["user"] = mysqli_fetch_assoc($result);
                    header("Location: index.php");
                }
                else
                {
                    // if there is no result, the credentials are wrong
                    echo "<script>incorrect('login');</script>";
                }
            }
        ?>
    </body>

    
</html>
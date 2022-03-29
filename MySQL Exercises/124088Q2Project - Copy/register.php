<!-- 124088 -->
<?php
    require "config.php";
    session_unset();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="script.js"></script>
        <title>Register for IMSA Quizzes</title>
    </head>

    <body>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href='login.php'>Login</a></li>
            <li><a class="active" href='register.php'>Register</a></li>
        </ul>

        <h1>Register</h1>
        <div id="login">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return confirmPassword();" method="post">
                <div id="fields">    
                    <label>First Name:</label><input type="text" name="fname" required><br>
                    <label>Last Name:</label><input type="text" name="lname" required><br>
                    <label>Email:</label><input type="email" name="email" onkeypress="return event.charCode != 32" required><br>
                    <label>Username:</label><input type="text" name="username" onkeypress="return event.charCode != 32" required><br>
                    <label>Password:</label><input id="password" type="password" class="password" name="password" required><br>
                    <label>Confirm Password:</label><input id="confirm_password" type="password" class="password" required><br>
                    <input id="submit" type="submit" name="submit" value="Sign up">
                    <p id="message"></p>
                </div>
                <div id="forgot">
                    <p>Forgot your password? <a href="reset.php">Reset it here</a></p>
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </form>
            
        </div>

        <?php
            if (isset($_POST["submit"]))
            {
                if (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["email"]) || empty($_POST["username"]) || empty ($_POST["password"]))
                {
                    echo "<script>incorrect('missing');</script>";
                    exit;
                }
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $email = $_POST["email"];
                $username = preg_replace("/[^A-Za-z0-9]/", "", test_input($_POST["username"]));
                $password = md5($_POST["password"]);
                
                // Creates a hash of the username
                $usernamehash = hash(hash_algos()[mt_rand(0, count(hash_algos())-1)], $username);
                
                $sql = "INSERT INTO Users (fname, lname, email, Username, usernamehash, Pword, csquizattempts, musicquizattempts) VALUES ('$fname', '$lname', '$email', '$username', '$usernamehash', '$password', 0, 0)";

                if (mysqli_query($conn, $sql))
                {
                    $sql = "SELECT * FROM Users WHERE Username = '$username'";
                    $result = mysqli_query($conn, $sql);

                    // Stores the user array in a session variable
                    $_SESSION["user"] = mysqli_fetch_assoc($result);

                    header("Location: index.php");
                }
                else
                {
                    // If the data cannot be inserted, it prints that this email or username is already in use
                    echo "<script>incorrect('register');</script>";
                }
            }
        ?>
    </body>
</html>
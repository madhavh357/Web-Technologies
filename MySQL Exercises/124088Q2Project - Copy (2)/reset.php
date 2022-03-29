<!-- 124088 -->
<?php
    require "config.php";
    // creates a resetting table
    $sql = "CREATE TABLE IF NOT EXISTS resetting (
        email VARCHAR(200),
        token VARCHAR(255) UNIQUE
        )";
    mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="script.js"></script>
        <title>Reset Password</title>
    </head>

    <body>
        <!-- Nav bar explained on index.php -->
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

        <h1>Change your password</h1>

        <?php
            // if there is no user token in the url, it wil display this form
            if (!isset($_GET["user"]))
            {
        ?>
                <div id="login">
                    
                    <!-- self submitting form - take email as input -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        
                        <div id="fields" class="sendemail">
                            <h2>Enter your email</h2>
                            <label>Email:</label><input type="email" name="email" onkeypress="return event.charCode != 32" required><br>
                            <input id="submit" type="submit" name="submit" value="Send email"><br>
                            <p id="message"></p>
                        </div>

                        <div id="forgot">
                            <p>Remember your password? <a href="login.php">Log in here</a></p>
                            <p>Don't have an account? <a href="register.php">Register here</a></p>
                        </div>
                    </form>
                </div>
        <?php
                // If the email and the submit button have values, send the email
                if (isset($_POST["email"]) && isset($_POST["submit"]))
                {
                    require "mailsetup.php";
                    // server side form validation
                    if (empty($_POST["email"]))
                    {
                        echo "<script>incorrect('missing');</script>";
                        exit;
                    }
                    // Checks if the submitted email is in the database. If not, a message is displayed that says so.
                    $email = test_input($_POST["email"]);
                    $sql = "SELECT * FROM users WHERE email='$email'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)==0)
                    {
                        echo "<script>incorrect('email')</script>";
                        exit;
                    }

                    // Inserts a random token that is associated with the email into the database. This prevents people from editing other people's emails
                    $token = bin2hex(random_bytes(40));
                    $sql = "INSERT INTO resetting (email, token) VALUES ('$email', '$token')";
                    mysqli_query($conn, $sql);
                    // Puts the token into a session so it is stored on the server. This way, it does not matter if the user edits it on inspect element
                    $_SESSION["token"] = $token;

                    $user = mysqli_fetch_array($result);
                    $fname = $user["fname"];
                    $lname = $user["lname"];
                    
                    // generates a url with the token stored as a $_GET value on the end
                    $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . "?user=$token";

                    // Email code from https://github.com/PHPMailer/PHPMailer/blob/master/examples/gmail.phps#L10
                    // Email framework downloaded from https://github.com/PHPMailer/PHPMailer

                    //Set an alternative reply-to address
                    //This is a good place to put user-submitted addresses
                    $mail->addReplyTo("$email", "$fname $lname");

                    //Set who the message is to be sent to
                    $mail->addAddress("$email", "$fname $lname");

                    //Set the subject line
                    $mail->Subject = 'Reset your password';

                    //Read an HTML message body from an external file, convert referenced images to embedded,
                    //convert HTML into a basic plain-text alternative body
                    $mail->msgHTML("Click <a href='$url'>here</a> to reset your password on IMSA quizzes");

                    //Replace the plain text body with one created manually
                    $mail->AltBody = "Go to $url to reset your password";

                    //send the message, check for errors
                    if (!$mail->send()) {
                        echo "<script>emailSent(false)</script>";
                    } else {
                        echo '<script>emailSent(true)</script>';
                    }
                }
            }
            else
            {
                // This else section runs if there is a $_GET["user"] exists

                // If the token in the url does not match the token in the session, it goes back to the beginning page. This prevents the user from putting someone else's token in the url.
                if ($_GET["user"] != $_SESSION["token"])
                {
                    header("Location: reset.php");
                }
                // If the token does not match an email in the resetting table, go back to the beginning page
                $sql = "SELECT email FROM resetting WHERE token='$_GET[user]'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 0)
                {
                    header("Location: reset.php");
                }

                // Selects the data corresponding to the email address
                $email = mysqli_fetch_array($result)["email"];
                $sql = "SELECT Username, usernamehash, fname, lname FROM Users WHERE email='$email'";
                $result = mysqli_query($conn, $sql);

                $user = mysqli_fetch_array($result);
        ?>
                <!-- Creates a form with this data and submits it to itself -->
                <div id="login">
                    <form action="reset.php?user=<?php echo $_SESSION["token"];?>" onsubmit="return confirmPassword()" method="post">
                        <div id="fields" class="reset">
                            <label>Name:</label><input type="text" name="name" value="<?php echo "$user[fname] $user[lname]"; ?>" readonly><br>
                            <label>Email:</label><input type="email" name="email" value="<?php echo $email; ?>" readonly><br>
                            <label>Username:</label><input type="text" name="username" value="<?php echo $user["Username"]; ?>" readonly><br>
                            <label>New password:</label><input id="password" type="password" class="password" name="password" required><br>
                            <label>Confirm Password:</label><input id="confirm_password" name="confirm_password" type="password" class="password" required><br>

                            <button type="submit" name="reset" value="resetpass">Change password</button>
                            <p id="message"></p>
                        </div>

                        <div id="forgot">
                            <p>Remember your password? <a href="login.php">Log in here</a></p>
                            <p>Don't have an account? <a href="register.php">Register here</a></p>
                        </div>
                    </form>
                </div>
        <?php
                // Once the form with the new password is submitted, this runs
                if (isset($_POST["password"]) && isset($_POST["confirm_password"]) && isset($_POST["reset"]))
                {
                    if (empty($_POST["password"]) || empty($_POST["confirm_password"]))
                    {
                        echo "<script>incorrect('missing')</script>";
                        exit;
                    }
                    // hashes the password
                    $password = md5($_POST["password"]);
                    // Selects the email associated with the token. If it cannot, it prints that it could not update the password
                    $sql = "SELECT email FROM resetting WHERE token = '$_SESSION[token]'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)==0)
                    {
                        echo "<script>incorrect('reset');</script>";
                        exit;
                    }
                    // Updates the password in the users database
                    $email = mysqli_fetch_array($result)["email"];
                    $sql = "UPDATE users SET Pword='$password' WHERE email='$email'";
                    if (mysqli_query($conn, $sql))
                    {
                        // Deletes the user from the resetting table
                        mysqli_query($conn, "DELETE FROM resetting WHERE token='$_SESSION[token]'");
                        unset($_SESSION["token"]);
                        header("Location: success.php");
                    }
                    else
                    {
                        // If it cannot update the password, it prints a message
                        echo "<script>incorrect('reset');</script>";
                        exit;
                    }
                }
            }
        ?>
    </body>
</html>
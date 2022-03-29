<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php
            require_once "config.php";
            mysqli_select_db($conn, "sqlex3");
            // Processes the data after the user updates the data
            if (isset($_POST["update"]))
            {
                $id = $_POST['id'];
    
                $name=$_POST['name'];
                $age=$_POST['age'];
                $email=$_POST['email'];
                
                // Updates the table with new data
                $result = mysqli_query($conn, "UPDATE users SET namef='$name',age=$age, email='$email' WHERE id=$id");

                // Goes back to view.php
                header("Location: view.php");
            }
            $id = $_GET['id'];
            $sql = "SELECT * FROM Users WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
        ?>
        <a href="index.php">Home</a>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table>
                <!-- Creates a table and fills input fields with current values for the fields -->
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" value=<?php echo "'$row[namef]'";?> required></td>
                </tr>

                <tr>
                    <td>Age</td>
                    <td><input type="number" name="age" value=<?php echo $row["age"];?> required></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value=<?php echo "'$row[email]'";?> required></td>
                </tr>
            </table>
            <!-- hidden input that submits the id -->
            <input type="hidden" name="id" value=<?php echo $id;?>>
            <input type="submit" name="update" value="Update">


        </form>
    </body>
</html>
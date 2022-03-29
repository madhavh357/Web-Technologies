<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <h1>Data in the database</h1>
        <table id="data">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Update</th>
            </tr>

            <?php
                require "config.php";
                mysqli_select_db($conn, "sqlex3");
                $sql = "SELECT * FROM Users";
                $result = mysqli_query($conn, $sql);
                // Displays the data in the database
                foreach ($result as $row)
                {
                    $name = $row["namef"];
                    $age = $row["age"];
                    $email = $row["email"];
                    // The last column creates links to edit.php and delete.php with the id in the url so they can be accessed with a get request
                    echo "
                    <tr>
                        <td>$name</td>
                        <td>$age</td>
                        <td>$email</td>
                        <td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onclick= \"return confirm('Are you sure you want to delete?')\">Delete</a></td>
                    </tr>";
                }
                
            ?>
        </table>
        <a href="add.html">Add More Data</a>
    </body>
</html>
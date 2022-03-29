<!-- 
    124088
    12/9/2021
    Manipulating data in a database
 -->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <h1>Exercise in manipulating data in the database</h1>
        <p>This exercise creates, adds, edits, and/or deletes data from the database. This page will take you to a add.html page where the user can fill out a form. This data is processed in add.php, gets added to the table. It has a link to view.php that allows the user to view the data. User can edit or delete the data (go to edit.php or delete.php). This page has a link to go back to add.html if the user wants to add more data.</p>
        <a href="add.html">Add new Data</a>
    </body>

    <?php
        require "config.php";
        // Creates the database and the Users table
        $sql = "CREATE DATABASE IF NOT EXISTS sqlex3";
        mysqli_query($conn, $sql);
        mysqli_select_db($conn, "sqlex3");

        $sql = "CREATE TABLE IF NOT EXISTS Users (
            id int(11) NOT NULL auto_increment PRIMARY KEY,
            namef varchar(200) NOT NULL,
            age int(200) NOT NULL,
            email varchar(200) NOT NULL,
            UNIQUE KEY (namef)
            )
        ";
        mysqli_query($conn, $sql);
    ?>
</html>
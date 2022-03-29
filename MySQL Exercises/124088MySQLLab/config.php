<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";

    $sql = "CREATE DATABASE IF NOT EXISTS guestDB";
    mysqli_query($conn, $sql);

    mysqli_select_db($conn, "guestdb");

    $sql = "CREATE TABLE IF NOT EXISTS guestbook (
        thename VARCHAR(50) UNIQUE,
        theemail VARCHAR(50),
        thedate DATE(50),
        themessage VARCHAR(200)
    )";
    mysqli_query($conn, $sql);

    $sql = "INSERT INTO guestbook (thename, theemail, thedate, themessage) VALUES ('John', 'j@a.com', '2021-12-13', 'Message over forty characters over forty characters)'";
    mysqli_query($conn, $sql);

    $sql = "INSERT INTO guestbook (thename, theemail, thedate, themessage) VALUES ('Johna', 'j@aa.com', '2021-12-17', 'Message)'";
    mysqli_query($conn, $sql);

    $sql = "INSERT INTO guestbook (thename, theemail, thedate, themessage) VALUES ('Joahna', 'j@aa.com', '2021-12-14', 'Message)'";
    mysqli_query($conn, $sql);
?>
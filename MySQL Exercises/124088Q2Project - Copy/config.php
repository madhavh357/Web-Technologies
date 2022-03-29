<!-- 124088 -->
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

    $sql = "CREATE DATABASE IF NOT EXISTS quiz";

    mysqli_query($conn, $sql);
    mysqli_select_db($conn, "quiz");

    $sql = "CREATE TABLE IF NOT EXISTS Users (
        fname VARCHAR(200),
        lname VARCHAR(200),
        email VARCHAR(200) UNIQUE,
        Username VARCHAR(200) UNIQUE,
        usernamehash VARCHAR(255) UNIQUE,
        Pword VARCHAR(255),
        csquizscore INT(6),
        csquizattempts INT(6),
        musicquizscore INT(6),
        musicquizattempts INT(6)
        )
    ";

    mysqli_query($conn, $sql);

    $sql = "CREATE TABLE IF NOT EXISTS csquiz (
        Question VARCHAR(900),
        Choice1 VARCHAR(900),
        Choice2 VARCHAR(900),
        Choice3 VARCHAR(900),
        Correct VARCHAR(900),
        Namef VARCHAR(200)
        )
    ";
    mysqli_query($conn, $sql);
    $csquiz = fopen("csquiz.csv", "r");
    $result = mysqli_query($conn, "SELECT * FROM csquiz");
    // Uploads quiz from a csv file
    while (($emapData = fgetcsv($csquiz, 10000, ",")) !== FALSE && mysqli_num_rows($result)==0)
    {
        $sql = "INSERT into csquiz (Question, Choice1, Choice2, Choice3, Correct, Namef) values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]')";
        mysqli_query($conn, $sql);
    }
    fclose($csquiz);

    $sql = "CREATE TABLE IF NOT EXISTS musicquiz (
        Question VARCHAR(900),
        Choice1 VARCHAR(900),
        Choice2 VARCHAR(900),
        Choice3 VARCHAR(900),
        Correct VARCHAR(900),
        Namef VARCHAR(200)
        )
    ";
    mysqli_query($conn, $sql);
    $musicquiz = fopen("musicquiz.csv", "r");
    $result = mysqli_query($conn, "SELECT * FROM musicquiz");
    while (($emapData = fgetcsv($musicquiz, 10000, ",")) !== FALSE && mysqli_num_rows($result)==0)
    {
        $sql = "INSERT into musicquiz (Question, Choice1, Choice2, Choice3, Correct, Namef) values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]')";
        mysqli_query($conn, $sql);
    }
    fclose($musicquiz);

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    session_start();
?>
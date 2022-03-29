<?php
    require_once "config.php";
    mysqli_select_db($conn, "sqlex3");
    $id = $_GET["id"];

    // Deletes the row with the given id and goes back to view.php
    if(mysqli_query($conn, "DELETE FROM Users WHERE id=$id"))
    {
        header("Location: view.php");
    }
?>